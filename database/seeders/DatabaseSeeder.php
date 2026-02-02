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
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@safepaws.com',
            'role' => 'admin',
            'nic' => '200012345678',
            'phone' => '0771000001',
            'address' => 'Colombo, Sri Lanka',
        ]);

        User::factory()->create([
            'name' => 'Rescue Team Member',
            'email' => 'rescue@safepaws.com',
            'role' => 'rescue_team',
            'nic' => '200012345679',
            'phone' => '0771000002',
            'address' => 'Kandy, Sri Lanka',
        ]);

        User::factory()->create([
            'name' => 'Dr. Vet User',
            'email' => 'vet@safepaws.com',
            'role' => 'veterinarian',
            'nic' => '200012345680',
            'phone' => '0771000003',
            'address' => 'Galle, Sri Lanka',
        ]);

        User::factory()->create([
            'name' => 'General User',
            'email' => 'user@safepaws.com',
            'role' => 'general_user',
            'nic' => '200012345681',
            'phone' => '0771000004',
            'address' => 'Matara, Sri Lanka',
        ]);

        $this->call(RescueSeeder::class);
    }
}
