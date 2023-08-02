<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductSale;
use App\Models\Product;

class ProductSaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Assuming you have products with IDs 1, 2, and 3 from the ProductSeeder
        ProductSale::create([
            'product_id' => 1,
            'quantity' => 5,
            'total_amount' => 2500,
        ]);

        ProductSale::create([
            'product_id' => 2,
            'quantity' => 10,
            'total_amount' => 300,
        ]);

        ProductSale::create([
            'product_id' => 3,
            'quantity' => 2,
            'total_amount' => 100,
        ]);

        // Add more product sales as needed
    }
}
