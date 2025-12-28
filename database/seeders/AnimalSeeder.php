<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Animal;

class AnimalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    Animal::insert([
        [
        'name' => 'Luna',
        'breed' => 'Mixed',
        'age' => 2,
        'condition' => 'Healthy',
        'rescue_team' => 'Team Alpha',
        'image_url' => 'https://images.unsplash.com/photo-1517849845537-4d257902454a?auto=format&fit=crop&w=1200&q=60',
        'status' => 'Adoptable',
        'created_at' => now(),
        'updated_at' => now(),
        ],
        [
        'name' => 'Max',
        'breed' => 'Labrador',
        'age' => 4,
        'condition' => 'Treated',
        'rescue_team' => 'Team Beta',
        'image_url' => 'https://images.unsplash.com/photo-1530281700549-e82e7bf110d6?auto=format&fit=crop&w=1200&q=60',
        'status' => 'Adoptable',
        'created_at' => now(),
        'updated_at' => now(),
        ],
    ]);
    }
}
