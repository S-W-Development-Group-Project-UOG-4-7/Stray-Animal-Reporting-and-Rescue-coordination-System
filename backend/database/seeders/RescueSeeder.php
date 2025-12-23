<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rescue;
use Carbon\Carbon;

class RescueSeeder extends Seeder
{
    public function run()
    {
        $rescues = [
            [
                'id' => 2045,
                'animal_type' => 'Dog',
                'condition' => 'Leg injury',
                'location' => 'River Street',
                'status' => 'rescued',
                
                'notes' => 'Recovering from leg injury',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 2046,
                'animal_type' => 'Cat',
                'condition' => 'Cornered, scared',
                'location' => 'Downtown Area',
                'status' => 'assigned',
                
                'notes' => 'Aggressive behavior, needs careful handling',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 2047,
                'animal_type' => 'Dog',
                'condition' => 'Severe infection',
                'location' => 'Central Park',
                'status' => 'in_progress',
                'notes' => 'Needs immediate medical attention',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 2041,
                'animal_type' => 'Dog',
                'condition' => 'Post-op recovery',
                'location' => 'Shelter',
                'status' => 'in_treatment',
                'notes' => 'Recovering from leg surgery',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 2042,
                'animal_type' => 'Cat',
                'condition' => 'Healthy',
                'location' => 'Shelter',
                'status' => 'ready_for_adoption',
                'notes' => 'Vaccinations complete, ready for adoption',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 2043,
                'animal_type' => 'Dog',
                'condition' => 'Infection',
                'location' => 'Shelter',
                'status' => 'in_treatment',
                'notes' => 'Under antibiotics treatment',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        foreach ($rescues as $rescue) {
            Rescue::create($rescue);
        }
    }
}