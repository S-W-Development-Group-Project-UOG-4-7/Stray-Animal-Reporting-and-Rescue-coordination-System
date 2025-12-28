<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin User
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@safepaws.com',
            'role' => 'admin',
            'nic' => '199512345678',
            'phone' => '0771234567',
            'address' => '123 Admin Street, Colombo 01',
        ]);

        // Veterinarian
        User::factory()->create([
            'name' => 'Dr. Sarah Fernando',
            'email' => 'vet@safepaws.com',
            'role' => 'vet',
            'nic' => '198856789012',
            'phone' => '0779876543',
            'address' => '456 Medical Road, Colombo 03',
        ]);

        // Rescue Team
        User::factory()->create([
            'name' => 'Rescue Team Lead',
            'email' => 'rescue@safepaws.com',
            'role' => 'rescue_team',
            'nic' => '199234567890',
            'phone' => '0775551234',
            'address' => '789 Rescue Avenue, Colombo 05',
        ]);

        // General Users
        User::factory()->create([
            'name' => 'John Perera',
            'email' => 'john@example.com',
            'role' => 'general_user',
            'nic' => '200012345678',
            'phone' => '0771112233',
            'address' => '321 Main Street, Colombo 07',
        ]);

        User::factory()->create([
            'name' => 'Mary Silva',
            'email' => 'mary@example.com',
            'role' => 'general_user',
            'nic' => '199978901234',
            'phone' => '0779998877',
            'address' => '654 Lake Road, Colombo 04',
        ]);

        User::factory()->create([
            'name' => 'David Fernando',
            'email' => 'david@example.com',
            'role' => 'general_user',
        ]);

        User::factory()->create([
            'name' => 'Dr. Kumar',
            'email' => 'kumar@safepaws.com',
            'role' => 'vet',
            'phone' => '0775554321',
        ]);
    }
}
