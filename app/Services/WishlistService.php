<?php

namespace App\Services;

use App\Models\Wishlist;
use Illuminate\Database\Eloquent\Collection;

class WishlistService
{
    /**
     * Get all wishlist items
     */
    public function getAll(bool $onlyActive = false): Collection
    {
        return Wishlist::query()
            ->when($onlyActive, fn ($q) => $q->where('status', true))
            ->orderBy('created_at', 'desc')
            ->get();
    }

    /**
     * Get single item
     */
    public function getById(int $id): Wishlist
    {
        return Wishlist::findOrFail($id);
    }

    /**
     * Mark item active/inactive
     */
    public function updateStatus(int $id, bool $status): Wishlist
    {
        $item = $this->getById($id);

        $item->update([
            'status' => $status,
        ]);

        return $item;
    }

    /**
     * Mark item as purchased and store payment metadata
     */
    public function markAsPurchased(
        int $id,
        string $purchasedBy,
        array $paymentMeta = []
    ): Wishlist {
        $item = $this->getById($id);

        $item->update([
            'status' => false, // or keep true depending on business rule
            'purchased_by' => $purchasedBy,
            'meta' => $paymentMeta,
        ]);

        return $item;
    }

    /**
     * Update editable fields
     */
    public function updateFields(int $id, array $data): Wishlist
    {
        $allowed = [
            'name',
            'price',
            'buy_online_url',
            'status',
            'purchased_by',
            'meta',
        ];

        $filteredData = array_intersect_key($data, array_flip($allowed));

        $item = $this->getById($id);
        $item->update($filteredData);

        return $item;
    }
}
