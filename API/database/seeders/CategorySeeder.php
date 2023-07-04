<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                "name" => "Phones",
                "description" => "Grab Upto 50% Off On Selected Phones",
                "image_path" => "https://example.com/phones.jpg"
            ],
            [
                "name" => "Laptops",
                "description" => "Huge Discounts On Laptops. Limited Time Offer!",
                "image_path" => "https://example.com/laptops.jpg"
            ],
            [
                "name" => "Accessories",
                "description" => "Shop Now For Exciting Deals On Accessories",
                "image_path" => "https://example.com/accessories.jpg"
            ],
            [
                "name" => "Monitors",
                "description" => "Upgrade Your Display With Amazing Monitor Deals",
                "image_path" => "https://example.com/monitors.jpg"
            ],
        ];

        DB::table('categories')->insert($categories);
    }
}
