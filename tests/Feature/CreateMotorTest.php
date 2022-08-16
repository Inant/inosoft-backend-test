<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CreateMotorTest extends BaseTest
{
    // protected $auth;

    public function test_auth()
    {
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => \Hash::make('password'),
        ]);

        // log in
        $response = $this->post(route('login'), [
            'email' => 'admin@mail.com',
            'password' => 'password'
        ]);
        $this->assertAuthenticated();
        // $this->auth = $response->assertStatus(200)->decodeResponseJson()['token'];
    }

    public function test_invalid_data()
    {
        $this->withoutMiddleware();

        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        // $this->actingAs($user, 'api');

        $data = [
            "tahun_keluaran" => "2022",
            "warna" => "Hitam",
            "harga" => "45000000",
            "tipe_suspensi" => "Monoshock",
            "stok" => 10,
        ];

        $response = $this->actingAs($user)->post(route('motor.store'), $data);
        // $this->assertAuthenticatedAs($user);
        $response->assertStatus(422);
    }

    public function test_success_create_motor()
    {
        $this->withoutMiddleware();

        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);

        $data = [
            "tahun_keluaran" => "2022",
            "warna" => "Hitam",
            "harga" => "45000000",
            "tipe_suspensi" => "Monoshock",
            "tipe_transmisi" => "Manual",
            "stok" => 10
        ];

        $response = $this->post(route('motor.store'), $data);
        $response->assertStatus(200);
    }
}
