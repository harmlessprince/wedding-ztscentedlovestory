<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $guarded = [];
    protected $casts = [
        'status' => 'boolean',
        'price' => 'integer',
        'meta' => 'array',
    ];
}
