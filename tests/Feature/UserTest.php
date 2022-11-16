<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
  public function test_login_redirect_to_dashboard_successfully()
  {
    User::factory()->create([
      'email' => 'test@gmail.com',
      'password' => bcrypt('password')
    ]);

    $response = $this->post('/login', [
      'email' => 'test@gmail.com',
      'password' => 'password'
    ]);

    $response->assertStatus(302);
    $response->assertRedirect('/dashboard');
  }

  public function test_auth_user_can_access_dashboard()
  {
    $user = User::factory()->create();
    $response = $this->actingAs($user)->get('/dashboard');
    $response->assertStatus(200);
  }
}
