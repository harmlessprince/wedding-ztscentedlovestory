<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();

            // Who / what payment is for
            $table->foreignId('wishlist_item_id')->nullable()->nullOnDelete();

            // Payment details
            $table->string('reference')->unique();
            $table->float('amount');
            $table->string('currency', 5)->default('NGN');

            // gift | simple
            $table->string('type')->default('cash');

            // success | failed | pending
            $table->string('status');

            // payer / gifter
            $table->string('payer_name')->nullable();
            $table->string('payer_email')->nullable();
            $table->string('payer_phone')->nullable();

            // Full gateway response
            $table->json('meta')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
