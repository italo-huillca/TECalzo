<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        \App\Models\User::factory(10)->create(); // Crea 10 usuarios normales

        // Crear un usuario administrador específico
        User::create([
            'name' => 'Admin',
            'email' => 'admin@tecalzo.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);
        User::create([
            'name' => 'User',
            'email' => 'usuario@tecalzo.com',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);
    }
}
