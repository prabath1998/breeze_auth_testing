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
  }
}
