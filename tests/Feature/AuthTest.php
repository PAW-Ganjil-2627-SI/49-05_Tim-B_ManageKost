<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_page_can_be_rendered(): void
    {
        $response = $this->get(route('login'));

        $response->assertStatus(200);
        $response->assertSee('Masuk ke Sistem');
        $response->assertSee('KosManage');
        $response->assertSee('admin@kosmanage.id');
    }

    public function test_user_can_login_with_correct_credentials(): void
    {
        $user = User::factory()->admin()->create([
            'email' => 'admin@kosmanage.id',
            'password' => Hash::make('password123'),
        ]);

        $response = $this->post(route('login.post'), [
            'email' => 'admin@kosmanage.id',
            'password' => 'password123',
        ]);

        $response->assertRedirect(route('dashboard'));
        $this->assertAuthenticatedAs($user);
    }

    public function test_user_cannot_login_with_incorrect_password(): void
    {
        User::factory()->create([
            'email' => 'admin@kosmanage.id',
            'password' => Hash::make('password123'),
        ]);

        $response = $this->post(route('login.post'), [
            'email' => 'admin@kosmanage.id',
            'password' => 'wrong-password',
        ]);

        $response->assertSessionHasErrors('email');
        $this->assertGuest();
    }

    public function test_register_page_can_be_rendered(): void
    {
        $response = $this->get(route('register'));

        $response->assertStatus(200);
        $response->assertSee('Buat Akun Baru');
        $response->assertSee('KosManage');
    }

    public function test_new_user_can_register(): void
    {
        $response = $this->post(route('register.post'), [
            'name' => 'Budi Operator',
            'email' => 'budi@kosmanage.id',
            'password' => 'secret123',
            'password_confirmation' => 'secret123',
        ]);

        $response->assertRedirect(route('dashboard'));
        $this->assertDatabaseHas('users', [
            'email' => 'budi@kosmanage.id',
            'role' => 'operator',
        ]);
        $this->assertAuthenticated();
    }

    public function test_authenticated_user_can_logout(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('logout'));

        $response->assertRedirect(route('login'));
        $this->assertGuest();
    }
}
