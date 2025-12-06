<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use App\Services\WishlistService;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function __construct(protected WishlistService $wishlistService)
    {
    }

    public function index()
    {
        return response()->json([
            'wishlists' => $this->wishlistService->getAll(),
        ]);
    }
}
