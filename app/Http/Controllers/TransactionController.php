<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TransactionController extends Controller
{
    public function initialize(Request $request)
    {
        $validated = $request->validate([
            'amount' => 'required|integer|min:500',
            'type' => 'required|in:gift,cash',
            'gateway' => 'nullable|string',
            'currency' => 'nullable|string|max:5',
            'wishlist_item_id' => 'nullable|exists:wishlists,id',
            'payer_name' => 'nullable|string',
            'payer_email' => 'nullable|email|max:255',
            'payer_phone' => 'nullable|string',
            'meta' => 'nullable|array',
        ]);


        $idempotencyKey = $this->generateIdempotencyKey($validated);
        $existingTransaction = Transaction::query()
            ->where('idempotency_key', $idempotencyKey)
            ->first();
        if ($existingTransaction) {
            return response()->json([
                'success' => true,
                'reference' => $existingTransaction->reference,
                'data' => $existingTransaction,
            ]);
        }
        $transaction = Transaction::query()->create([
            'reference' => $this->generateReference($validated['type']),
            'wishlist_item_id' => $validated['wishlist_item_id'] ?? null,
            'amount' => $validated['amount'],
            'idempotency_key' => $idempotencyKey,
            'type' => $validated['type'], // gift | simple
            'status' => 'pending',
            'payer_name' => $validated['payer_name'] ?? null,
            'payer_email' => $validated['payer_email'] ?? null,
            'payer_phone' => $validated['payer_phone'] ?? null,
        ]);

        return response()->json([
            'success' => true,
            'reference' => $transaction->reference,
            'data' => $transaction,
        ]);
    }

    private function generateReference(string $type): string
    {
        return sprintf(
            'TZ_%s_%s_%s',
            strtoupper($type),
            time(),
            Str::upper(Str::random(4))
        );
    }

    public function confirm(Request $request)
    {
        $validated = $request->validate([
            'reference' => 'required|string',
        ]);

        $transaction = Transaction::query()->where('reference', $validated['reference'])->first();
        if (!$transaction) {
            return response()->json([
                'success' => false,
            ]);
        }
        $transaction->update([
            'status' => 'approved',
        ]);
        return response()->json([
            'success' => true,
        ]);
    }


    /**
     * Generates an idempotency key using SHA-256 hash based on critical transaction data.
     * The key is consistent for the same input data, ensuring the transaction is only processed once.
     *
     * @param array $validatedData The validated request data array.
     * @return string The generated SHA-256 hash key.
     */
    private function generateIdempotencyKey(array $validatedData): string
    {
        // 1. Define the critical fields that uniquely identify this transaction attempt.
        // We exclude 'reference' and 'status' as they are outcomes, not inputs.
        $criticalFields = [
            'wishlist_item_id',
            'amount',
            'type',
            'payer_name',
            'payer_email',
            'payer_phone',
        ];

        // 2. Extract only the critical data points.
        $dataToHash = [];
        foreach ($criticalFields as $field) {
            // Use array_key_exists for robust checking, and use the validated data.
            if (array_key_exists($field, $validatedData)) {
                $dataToHash[$field] = $validatedData[$field];
            }
        }


        if (function_exists('auth') && auth()->check()) {
            $dataToHash['user_id'] = auth()->id();
        } else {
            $dataToHash['user_id'] = $validatedData['payer_email'] ?? 'guest';
        }


        // 4. Sort the array alphabetically. This is crucial!
        // It ensures that the hash is the same regardless of the order of keys in the input array.
        ksort($dataToHash);

        // 5. Convert the final, sorted array into a consistent JSON string.
        $jsonString = json_encode($dataToHash);

        // 6. Generate the SHA-256 hash.
        return hash('sha256', $jsonString);
    }

}
