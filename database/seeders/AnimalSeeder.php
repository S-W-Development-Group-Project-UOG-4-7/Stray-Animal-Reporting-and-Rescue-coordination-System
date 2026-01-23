<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Animal;
use Illuminate\Support\Facades\Schema;

class AnimalSeeder extends Seeder
{
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Animal::truncate();
        Schema::enableForeignKeyConstraints();

        Animal::insert([
            [
                'name' => 'Luna',
                'type' => 'Dog',
                'gender' => 'Female', // <--- Added
                'breed' => 'Mixed Breed',
                'age' => 2,
                'condition' => 'Healthy',
                'rescue_team' => 'Team Alpha',
                'image_url' => 'https://images.unsplash.com/photo-1517849845537-4d257902454a?auto=format&fit=crop&w=800&q=80',
                'status' => 'Adoptable',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'name' => 'Oliver',
                'type' => 'Cat',
                'gender' => 'Male', // <--- Added
                'breed' => 'Tabby',
                'age' => 3,
                'condition' => 'Blind',
                'rescue_team' => 'Cat Rescue Unit',
                'image_url' => 'https://images.unsplash.com/photo-1514888286974-6c03e2ca1dba?auto=format&fit=crop&w=800&q=80',
                'status' => 'Adoptable',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'name' => 'Max',
                'type' => 'Dog',
                'gender' => 'Male',
                'breed' => 'Labrador',
                'age' => 4,
                'condition' => 'Recovered',
                'rescue_team' => 'Team Beta',
                'image_url' => 'https://images.unsplash.com/photo-1530281700549-e82e7bf110d6?auto=format&fit=crop&w=800&q=80',
                'status' => 'Adoptable',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'name' => 'Cleo',
                'type' => 'Cat',
                'gender' => 'Female',
                'breed' => 'Siamese',
                'age' => 2,
                'condition' => 'Healthy',
                'rescue_team' => 'Cat Rescue Unit',
                'image_url' => 'https://images.unsplash.com/photo-1513245543132-31f507417b26?auto=format&fit=crop&w=800&q=80',
                'status' => 'Adoptable',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'name' => 'Rocky',
                'type' => 'Dog',
                'gender' => 'Male',
                'breed' => 'German Shepherd',
                'age' => 5,
                'condition' => 'Treated',
                'rescue_team' => 'Team Alpha',
                'image_url' => 'https://images.unsplash.com/photo-1589941013453-ec89f33b5e95?auto=format&fit=crop&w=800&q=80', 
                'status' => 'Adoptable',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'name' => 'Simba',
                'type' => 'Cat',
                'gender' => 'Male',
                'breed' => 'Ginger Cat',
                'age' => 1,
                'condition' => 'Healthy',
                'rescue_team' => 'Cat Rescue Unit',
                'image_url' => 'https://images.unsplash.com/photo-1574158622682-e40e69881006?auto=format&fit=crop&w=800&q=80', 
                'status' => 'Adoptable',
                'created_at' => now(), 'updated_at' => now(),
            ],
        ]);
    }
}