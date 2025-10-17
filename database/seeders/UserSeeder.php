<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
        ])->assignRole('admin');

        Profile::create([
            'user_id' => 1,
            'cpf' => '123.456.789-00',
            'phone' => '(11) 91234-5678',
            'whatsapp' => '(11) 91234-5678',
            'birthday' => '1990-01-01',
            'cep' => '12345-678',
            'state' => 'SP',
            'city' => 'São Paulo',
            'neighborhood' => 'Centro',
            'street' => 'Rua Exemplo',
            'number' => '100',
            'complement' => 'Apto 101',
            'x' => null,
            'facebook' => 'https://facebook.com/adminuser',
            'instagram' => 'https://instagram.com/adminuser',
            'youtube' => null,
            'tiktok' => null,
            'about_me' => 'This is the admin user profile.',
            'avatar_url' => null,
        ]);
    }
}
