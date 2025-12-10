<?php

namespace App\Http\Controllers;

use App\Services\WishlistService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;


class PaystackWebhookController extends Controller
{


   public function __construct(private WishlistService $wishlistService)
   {
   }

    public function handle(Request $request)
    {

        Log::error('Recieved Webhook', $request->all());
        // Verify Paystack signature
        if (! $this->isValidPaystackSignature($request)) {
            Log::warning('Invalid Paystack webhook signature');
            return response()->json(['message' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);
        }

        $payload = $request->all();

        // Only handle successful charges
        if (($payload['event'] ?? null) !== 'charge.success' || ($payload['event'] ?? null) !== 'transfer.success') {
            return response()->json(['message' => 'Ignored'], 200);
        }

        $data = $payload['data'];

        // ✅ Metadata sent when initializing transaction
        $itemId = $data['metadata']['productId'] ?? null;
        $phoneNumber = $data['metadata']['phoneNumber'] ?? null;
        $fullName = $data['metadata']['fullName'] ?? null;

        if (!$itemId || !$phoneNumber) {
            Log::error('Missing metadata in Paystack webhook', $payload);
            return response()->json(['message' => 'Invalid payload'], 400);
        }

        // ✅ Mark wishlist item as purchased
        $this->wishlistService->markAsPurchased(
            (int) $itemId,
            (string) "{$fullName} || {$phoneNumber}",
            [
                'gateway' => 'paystack',
                'reference' => $data['reference'],
                'transaction_id' => $data['id'],
                'status' => $data['status'],
                'amount' => $data['amount'] / 100, // Kobo → Naira
                'currency' => $data['currency'],
                'paid_at' => $data['paid_at'],
                'channel' => $data['channel'],
                'authorization' => $data['authorization'] ?? null,
                'customer' => [
                    'email' => $data['customer']['email'] ?? null,
                    'code' => $data['customer']['customer_code'] ?? null,
                ],
                'raw' => $data,
            ]
        );

        return response()->json(['message' => 'Processed'], 200);
    }


    private function isValidPaystackSignature(Request $request): bool
    {
        $signature = $request->header('x-paystack-signature');

        if (!$signature) {
            return false;
        }

        $computed = hash_hmac(
            'sha512',
            $request->getContent(),
            env('PAYSTACK_SECRET_KEY')
        );

        return hash_equals($computed, $signature);
    }
}
