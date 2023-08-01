<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\ProductType;

class ProductTypeTest extends TestCase
{
    public function testCreateProductType()
    {
        $productTypeData = [
            'name' => 'Electronics',
        ];

        $productType = ProductType::create($productTypeData);

        $this->assertNotNull($productType);
        $this->assertDatabaseHas('product_types', $productTypeData);
    }

    public function testUpdateProductType()
    {
        $productType = ProductType::create([
            'name' => 'Electronics',
        ]);

        $updatedData = [
            'name' => 'Updated Electronics',
        ];
        $productType->update($updatedData);

        $this->assertDatabaseHas('product_types', $updatedData);
    }

    public function testDeleteProductType()
    {
        $productType = ProductType::create([
            'name' => 'Electronics',
        ]);

        $productType->delete();

        $this->assertDatabaseMissing('product_types', ['id' => $productType->id]);
    }
}
