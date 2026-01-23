<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Adoption;

class AdoptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Adoption::create([
            'first_name' => 'Test',
            'last_name' => 'User',
            'email' => 'test@safepaws.com',
            'phone' => '0771234567',
            'dob' => '2000-01-01',
            'address' => 'Colombo, Sri Lanka',
            'housing_type' => 'own',
            'animal_id' => 'max',
            'previous_pet' => 'yes',
            'current_pets' => null,
            'adoption_reason' => 'Love animals',
            'home_environment' => 'Family home',
            'vet_info' => null,
            'terms' => true,
            'newsletter' => false
        ]);
    }
}
