<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
  const Endpoints = [
    'signin' => '/api/signin',
    'signup' => '/api/signup',
    'signout' => '/api/signout',
    'user' => '/api/user',
  ];

  public function test_that_client_can_signup()
  {
    $user = User::factory()->make();

    $response = $this->postJson(self::Endpoints['signup'], array_merge($user->toArray(), [
      'password' => 'password',
      'password_confirmation' => 'password',
    ]));

    $response->assertStatus(200)
      ->assertJson(
        fn (AssertableJson $json) => $json
          ->hasAll(['success', 'message', 'data'])
          ->where('data.username', $user->name)
          ->whereType('data.token', 'string')
          ->etc()
      );
  }

  public function test_that_client_can_login()
  {
    $response = $this->postJson(self::Endpoints['signin'], [
      'email' => 'test@example.com',
      'password' => 'password',
    ]);

    $response->assertStatus(200)
      ->assertJson(
        fn (AssertableJson $json) => $json
          ->hasAll(['success', 'message', 'data'])
          ->whereType('data.token', 'string')
          ->has('data.user')
          ->etc()
      );
  }

  public function test_that_client_can_get_user_info()
  {
    $user = User::find(1);
    $token = $user->createToken('authToken')->plainTextToken;

    $response = $this->getJson(self::Endpoints['user'], [
      'Authorization' => "Bearer {$token}",
    ]);

    $response->assertStatus(200)
      ->assertJson(
        fn (AssertableJson $json) => $json
          ->hasAll(['success', 'message', 'data'])
          ->where('data', $user->toArray())
          ->etc()
      );
  }

  public function test_that_client_can_logout()
  {
    $user = User::find(1);
    $token = $user->createToken('authToken')->plainTextToken;

    $response = $this->getJson(self::Endpoints['signout'], [
      'Authorization' => "Bearer {$token}",
    ]);

    $response->assertStatus(200)
      ->assertJson(
        fn (AssertableJson $json) => $json
          ->hasAll(['success', 'message'])
          ->etc()
      );
  }
}
