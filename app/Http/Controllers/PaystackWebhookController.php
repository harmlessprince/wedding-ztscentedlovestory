<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
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

        Log::info('Recieved Webhook', $request->all());
        // Verify Paystack signature
        if (!$this->isValidPaystackSignature($request)) {
            Log::error('Invalid Paystack webhook signature');
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


        if ($itemId){
            // ✅ Mark wishlist item as purchased
            $this->wishlistService->markAsPurchased(
                (int) $itemId,
                (string) "{$fullName} || {$phoneNumber}",
                $data
            );
        }else{
            Log::error('Missing productId in Paystack webhook', $payload);
        }
        $status = $data['status'] ?? null;
        if ($status){
            Transaction::query()->where('reference', $data['reference'])->update([
                'meta' => $data,
                'status' => $status,
            ]);
        }else{
            Log::error('Missing transaction status in Paystack webhook', $payload);
        }


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
