<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Jalankan seeder untuk tabel users.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin Hotel',
                'email' => 'admin@hotel.com',
                'password' => Hash::make('password123'),
                'phone_number' => '081234567890',
                'role' => 'admin',
            ],
            [
                'name' => 'Resepsionis',
                'email' => 'resepsionis@hotel.com',
                'password' => Hash::make('resepsionis123'),
                'phone_number' => '081298765432',
                'role' => 'customer',
            ],
            [
                'name' => 'Tamu Hotel',
                'email' => 'tamu@hotel.com',
                'password' => Hash::make('tamu123'),
                'phone_number' => '081212345678',
                'role' => 'admin',
            ],
        ]);
    }
} 