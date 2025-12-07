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
            'payer_email' => 'nullable|email',
            'payer_phone' => 'nullable|email',
            'meta' => 'nullable|array',
        ]);

        $transaction = Transaction::create([
            'reference' => $this->generateReference($validated['type']),
            'wishlist_item_id' => $validated['wishlist_item_id'] ?? null,
            'amount' => $validated['amount'],
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
            'TXN_%s_%s_%s',
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
}
