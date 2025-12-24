<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RescueSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('rescues')->insert([
            [
                'animal_type' => 'Dog',
                'condition' => 'Post-op recovery',
                'location' => 'Shelter',
                'status' => 'in_treatment',
                'notes' => 'Recovering from leg surgery',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animal_type' => 'Cat',
                'condition' => 'Healthy',
                'location' => 'Shelter',
                'status' => 'ready_for_adoption',
                'notes' => 'Vaccinations complete, ready for adoption',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animal_type' => 'Dog',
                'condition' => 'Infection',
                'location' => 'Shelter',
                'status' => 'in_treatment',
                'notes' => 'Under antibiotics treatment',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animal_type' => 'Dog',
                'condition' => 'Leg injury',
                'location' => 'River Street',
                'status' => 'rescued',
                'notes' => 'Recovering from leg injury',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animal_type' => 'Cat',
                'condition' => 'Cornered',
                'location' => 'Matara',
                'status' => 'assigned',
                'notes' => 'Aggressive behavior',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animal_type' => 'Dog',
                'condition' => 'Severe infection',
                'location' => 'Central Park',
                'status' => 'in_progress',
                'notes' => 'Needs immediate medical attention',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
