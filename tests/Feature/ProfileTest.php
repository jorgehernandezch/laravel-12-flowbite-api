<?php

use App\Models\User;
use App\Models\Profile;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;

uses(RefreshDatabase::class);

test('profile page is displayed', function () {
    $user = User::factory()->create();

    $response = $this
        ->actingAs($user)
        ->get(route('app.profile', absolute: false));

    $response->assertOk();
});

test('basic info can be updated via api', function () {
    $user = User::factory()->create();
    $originalEmail = $user->email;
    Profile::create([
        'user_id' => $user->id,
        'cpf' => '12345678909',
    ]);

    Sanctum::actingAs($user);

    $response = $this->putJson('/api/v1/user/basic-info', [
        'name' => 'Test User',
        'email' => $originalEmail,
    ]);

    $response
        ->assertOk()
        ->assertJsonPath('data.user.name', 'Test User');

    $user->refresh();

    $this->assertSame('Test User', $user->name);
    $this->assertSame($originalEmail, $user->email);
    $this->assertNotNull($user->email_verified_at);
});

test('user can deactivate their account via api', function () {
    $user = User::factory()->create();

    Sanctum::actingAs($user);

    $response = $this->postJson('/api/v1/user/deactivate');

    $response->assertOk();

    $this->assertFalse((bool) $user->fresh()->is_active);
});

test('user can delete their account via api', function () {
    $user = User::factory()->create();

    Sanctum::actingAs($user);

    $response = $this->deleteJson('/api/v1/user/delete');

    $response->assertOk();

    $this->assertNotNull($user->fresh()->deleted_at);
});
