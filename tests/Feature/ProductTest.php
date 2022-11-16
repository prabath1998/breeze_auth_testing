<?php

namespace Tests\Feature;

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
}
