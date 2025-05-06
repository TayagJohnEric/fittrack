<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@example.com'], // Ensures no duplicate admin
            [
                'name' => 'Admin User',
                'password' => Hash::make('password123'), // Change to a secure password
                'role' => 'admin',
            ]
        );
    }
}
