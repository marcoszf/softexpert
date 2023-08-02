<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductType;

class ProductTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductType::create(['name' => 'Electronics']);
        ProductType::create(['name' => 'Clothing']);
        ProductType::create(['name' => 'Books']);
        // Add more product types as needed
    }
}
