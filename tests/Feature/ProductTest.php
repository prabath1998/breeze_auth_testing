<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{

    private $product;

    public function setup(): void
    {
        parent::setup();
        $this->product =
            Product::factory()->create();
    }

    public function test_products_route_return_ok()
    {
        $respose = $this->get('/products');
        $respose->assertSee('products');
        $respose->assertStatus(200);
    }

    public function test_product_has_name()
    {

        $this->assertNotEmpty($this->product->name);
    }

    public function test_products_are_not_empty()
    {
        $product = Product::factory()->create();
        $response = $this->get('/products');
        // $response->assertDontSee('No products available');
        $response->assertSee($this->product->name);
    }

    public function test_auth_user_can_see_the_buy_button()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/products');
        $response->assertSee('Buy Product');
    }

    public function test_unauth_user_cannot_see_buy_button()
    {
        $response =  $this->get('/products');
        $response->assertDontSee('Buy Product');
    }

    public function test_auth_user_can_see_create_link()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/products');
        $response->assertSee('Create');
    }

    public function test_unauth_user_cannot_see_create_link()
    {
        $response =  $this->get('/products');
        $response->assertDontSee('Create');
    }
}
