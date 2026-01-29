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
                'name' => 'Kalu',
                'type' => 'Dog',
                'gender' => 'Male',
                'breed' => 'SL Street Mix',
                'age' => 4,
                'condition' => 'Healthy',
                'rescue_team' => 'Colombo City Rescue',
                // Authentic Black Street Dog look
                'image_url' => 'https://images.unsplash.com/photo-1553603227-2358e375ece5?auto=format&fit=crop&w=800&q=80',
                'status' => 'Adoptable',
                'description' => 'Kalu is a loyal guardian. He loves rice and fish and is very protective of his territory.',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'name' => 'Suddi',
                'type' => 'Dog',
                'gender' => 'Female',
                'breed' => 'Local Mix',
                'age' => 2,
                'condition' => 'Recovered',
                'rescue_team' => 'Kandy Animal Link',
                // White/Brown "Innocent" look common in SL
                'image_url' => 'https://images.unsplash.com/photo-1518020382113-a7e8fc38eac9?auto=format&fit=crop&w=800&q=80', 
                'status' => 'Adoptable',
                'description' => 'Suddi was found near a temple. She is extremely gentle, slightly shy, but loves to sit by your feet.',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'name' => 'Thiththa',
                'type' => 'Cat',
                'gender' => 'Female',
                'breed' => 'Domestic Short Hair',
                'age' => 1,
                'condition' => 'Healthy',
                'rescue_team' => 'Cat Rescue Unit',
                // Classic Calico/Tortoiseshell Cat
                'image_url' => 'https://images.unsplash.com/photo-1596796459039-b97c024d266e?auto=format&fit=crop&w=800&q=80',
                'status' => 'Adoptable',
                'description' => 'A feisty little girl! Thiththa loves climbing mango trees and chasing geckos.',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'name' => 'Rambo',
                'type' => 'Dog',
                'gender' => 'Male',
                'breed' => 'Brown Street Dog',
                'age' => 5,
                'condition' => 'Three-Legged',
                'rescue_team' => 'Galle Paw Foundation',
                // The classic Brown "Waal" dog
                'image_url' => 'https://images.unsplash.com/photo-1505628346881-b72b27e84530?auto=format&fit=crop&w=800&q=80',
                'status' => 'Adoptable',
                'description' => 'Rambo is a survivor. He lost a leg in a tuk-tuk accident but runs faster than any other dog!',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'name' => 'Manika',
                'type' => 'Cat',
                'gender' => 'Female',
                'breed' => 'Ginger Mix',
                'age' => 2,
                'condition' => 'Healthy',
                'rescue_team' => 'Colombo Rescue',
                // Ginger Cat
                'image_url' => 'https://images.unsplash.com/photo-1513245543132-31f507417b26?auto=format&fit=crop&w=800&q=80',
                'status' => 'Adoptable',
                'description' => 'Manika loves sleeping on the roof. She is very quiet and loves fresh fish.',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'name' => 'Bink',
                'type' => 'Dog',
                'gender' => 'Male',
                'breed' => 'Spotted Mix',
                'age' => 1,
                'condition' => 'Healthy',
                'rescue_team' => 'Negombo Dog Care',
                // Black and white spotted street puppy
                'image_url' => 'https://images.unsplash.com/photo-1591946614720-90a587da4a36?auto=format&fit=crop&w=800&q=80',
                'status' => 'Adoptable',
                'description' => 'Full of energy! He is vaccinated, sterilized, and ready for a forever home.',
                'created_at' => now(), 'updated_at' => now(),
            ],
        ]);
    }
}