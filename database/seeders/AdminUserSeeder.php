<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'fauzannashiruddin50@gmail.com'],
            [
                'name' => 'Muhammad Fauzan Nashiruddin',
                'password' => Hash::make('password123'),
            ]
        );

        // Create demo admin user
        User::updateOrCreate(
            ['email' => 'admin@carwash.demo'],
            [
                'name' => 'Demo Admin',
                'password' => Hash::make('admin123'),
            ]
        );
    }
}
