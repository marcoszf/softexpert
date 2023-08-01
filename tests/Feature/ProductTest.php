<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Product;

class ProductTest extends TestCase
{
    public function testCreateProduct()
    {
        $productData = [
            'name' => 'Smartphone',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua',
            'price' => 30,
            'product_type_id' => 1,
        ];

        $product = Product::create($productData);

        $this->assertNotNull($product);
        $this->assertDatabaseHas('products', $productData);
    }

    public function testUpdateProduct()
    {
        $product = Product::create([
            'name' => 'Smartphone',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua',
            'price' => 30,
            'product_type_id' => 1,
        ]);

        $updatedData = [
            'name' => 'Updated Smartphone',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua',
            'price' => 35,
            'product_type_id' => 2,
        ];
        $product->update($updatedData);

        $this->assertDatabaseHas('products', $updatedData);
    }

    public function testDeleteProduct()
    {
        $product = Product::create([
            'name' => 'Smartphone',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua',
            'price' => 35,
            'product_type_id' => 2,
        ]);

        $product->delete();

        $this->assertDatabaseMissing('products', ['id' => $product->id]);
    }
}
