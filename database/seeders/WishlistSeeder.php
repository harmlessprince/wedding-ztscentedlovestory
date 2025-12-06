<?php

namespace Database\Seeders;

use App\Models\Wishlist;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WishlistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Wishlist::query()->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $items = [
            [
                'name' => 'Buchimix Juicer',
                'price' => 270000,
                'buy_online_url' => 'https://buchymix.com.ng/products/batch-juicer-with-high-torque-motor-stainless-steel-blades-high-stbj40',
                'status' => true,
            ],
            [
                'name' => 'Utility shelf',
                'price' => 68000,
                'buy_online_url' => 'https://www.tiktok.com/@simpleyemi/video/7439292669597060408?q=kitchen%20shelf&t=1765036349927',
                'status' => true,
            ],
            [
                'name' => 'Oraimo Steamer',
                'price' => 41900,
                'buy_online_url' => 'https://ng.oraimo.com/product/oraimo-smartsteamer-1500w-rapid-heating-led-indicator-portable-handheld-garment-steamer?srsltid=AfmBOorUhfxwA7LvQIAT_P4_zec7ju172PFmHqOFu_wAC-nFQyH2iCeL',
                'status' => true,
            ],
            [
                'name' => 'Maxi Induction cooker',
                'price' => 44000,
                'buy_online_url' => 'https://fouanistore.com/product/971?maxi-induction-cooker-2100-watts-led-display-wt2103c',
                'status' => true,
            ],
            [
                'name' => 'LG TV UHD 55 Inch UA73 4K Smart TV',
                'price' => 644000,
                'buy_online_url' => 'https://fouanistore.com/product/943?lg-tv-uhd-55-inch-ua73-4k-smart-tv-ready-hdr10-webos25',
                'status' => true,
            ],
            [
                'name' => 'Maxi Air Cooler Fan',
                'price' => 209000,
                'buy_online_url' => 'https://fouanistore.com/product/814?maxi-air-cooler-fan-200w-53l-200-17jr',
                'status' => true,
            ],
            [
                'name' => 'LG Split AC 1.0 HP ',
                'price' => 463000,
                'buy_online_url' => 'https://fouanistore.com/product/402?lg-split-ac-1-0-hp-dual-inverter-advanced-features',
                'status' => true,
            ],
        ];

        Wishlist::insert($items);
    }
}
