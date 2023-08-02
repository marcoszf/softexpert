<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\ProductType;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Assuming you have product types with IDs 1, 2, and 3 from the ProductTypeSeeder
        Product::create([
            'name' => 'Smartphone',
            'description' => 'A powerful smartphone with great features.',
            'price' => 500,
            'product_type_id' => 1,
        ]);

        Product::create([
            'name' => 'T-shirt',
            'description' => 'A comfortable and stylish t-shirt.',
            'price' => 30,
            'product_type_id' => 2,
        ]);

        Product::create([
            'name' => 'Laravel Book',
            'description' => 'A comprehensive guide to Laravel development.',
            'price' => 50,
            'product_type_id' => 3,
        ]);

        // Add more products as needed
    }

}
