<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin User
        User::create([
            'name' => 'API Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('123456'),
            'role' => 'admin',
        ]);

        // Sender User
        User::create([
            'name' => 'Sender One',
            'email' => 'sender@example.com',
            'password' => Hash::make('123456'),
            'role' => 'sender',
        ]);

        // Standard User
        User::create([
            'name' => 'John Doe',
            'email' => 'user@example.com',
            'password' => Hash::make('123456'),
            'role' => 'user',
        ]);
    }
} 