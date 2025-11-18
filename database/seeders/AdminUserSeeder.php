<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin felhasználó létrehozása
        User::create([
            'name' => 'Admin',
            'email' => 'admin@cukraszda.hu',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        // Normál felhasználó létrehozása (teszteléshez)
        User::create([
            'name' => 'Teszt Felhasználó',
            'email' => 'user@cukraszda.hu',
            'password' => Hash::make('user123'),
            'role' => 'user',
        ]);
    }
}