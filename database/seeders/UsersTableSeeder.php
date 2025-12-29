<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin User',
                'email' => 'admin@safepaws.org',
                'email_verified_at' => now(),
                'password' => Hash::make('admin123'),
                'role' => 'admin',
                'status' => 'active',
                'nic' => '199012345678',
                'phone' => '+94771234567',
                'address' => '123 Admin Street, Colombo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dr. Samantha Silva',
                'email' => 'vet@safepaws.org',
                'email_verified_at' => now(),
                'password' => Hash::make('vet123'),
                'role' => 'vet',
                'status' => 'active',
                'nic' => '198512345678',
                'phone' => '+94772345678',
                'address' => '456 Vet Lane, Kandy',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Rescue Team Leader',
                'email' => 'rescue@safepaws.org',
                'email_verified_at' => now(),
                'password' => Hash::make('rescue123'),
                'role' => 'rescue',
                'status' => 'active',
                'nic' => '198812345678',
                'phone' => '+94773456789',
                'address' => '789 Rescue Road, Galle',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Public User',
                'email' => 'user@safepaws.org',
                'email_verified_at' => now(),
                'password' => Hash::make('user123'),
                'role' => 'public',
                'status' => 'active',
                'nic' => '199512345678',
                'phone' => '+94774567890',
                'address' => '321 Public Avenue, Negombo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Create more random users
        for ($i = 1; $i <= 20; $i++) {
            DB::table('users')->insert([
                'name' => 'User ' . $i,
                'email' => 'user' . $i . '@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password' . $i),
                'role' => 'public',
                'status' => 'active',
                'nic' => '199' . str_pad($i, 10, '0', STR_PAD_LEFT),
                'phone' => '+9477' . rand(1000000, 9999999),
                'address' => 'Address ' . $i . ', City',
                'created_at' => now()->subDays(rand(1, 365)),
                'updated_at' => now(),
            ]);
        }
    }
}