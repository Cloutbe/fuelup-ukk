<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // 1. Buat Akun ADMIN
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@fuelup.com',
            'password' => Hash::make('admin123'), // Password Admin
            'role' => 'admin',
        ]);

        // 2. Buat Akun USER BIASA (Dummy)
        User::create([
            'name' => 'Pelanggan Setia',
            'email' => 'user@fuelup.com',
            'password' => Hash::make('user123'), // Password User
            'role' => 'user',
        ]);
    }
}