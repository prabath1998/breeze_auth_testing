<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    public function test_products_route_return_ok()
    {
        $respose = $this->get('/products');
        $respose->assertSee('products');
        $respose->assertStatus(200);
    }

    // public function test_product_has_name()
    // {
    //     $product  = Product::factory()->create();
    //     $this->assertNotEmpty($product->name);
    // }

    public function test_products_are_empty()
    {
        $response = $this->get('/products');
        $response->assertSee('No products available');
    }
}
