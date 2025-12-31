<?php

namespace Database\Seeders;

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
                'breed' => 'Mixed Breed',
                'age' => 2,
                'condition' => 'Healthy',
                'rescue_team' => 'Team Alpha',
                'image_url' => 'https://images.unsplash.com/photo-1517849845537-4d257902454a?auto=format&fit=crop&w=800&q=80', // Bulldog/Mix
                'status' => 'Adoptable',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Max',
                'breed' => 'Labrador Retriever',
                'age' => 4,
                'condition' => 'Recovered',
                'rescue_team' => 'Team Beta',
                'image_url' => 'https://images.unsplash.com/photo-1530281700549-e82e7bf110d6?auto=format&fit=crop&w=800&q=80', // Dog in grass
                'status' => 'Adoptable',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bella',
                'breed' => 'Golden Retriever',
                'age' => 1,
                'condition' => 'Healthy',
                'rescue_team' => 'Team Gamma',
                'image_url' => 'https://images.unsplash.com/photo-1552053831-71594a27632d?auto=format&fit=crop&w=800&q=80', // Golden Retriever
                'status' => 'Adoptable',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Oliver',
                'breed' => 'Tabby Cat',
                'age' => 3,
                'condition' => 'Special Needs (Blind)',
                'rescue_team' => 'Cat Rescue Unit',
                'image_url' => 'https://images.unsplash.com/photo-1514888286974-6c03e2ca1dba?auto=format&fit=crop&w=800&q=80', // Cat close up
                'status' => 'Adoptable',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Rocky',
                'breed' => 'German Shepherd',
                'age' => 5,
                'condition' => 'Treated for Injury',
                'rescue_team' => 'Team Alpha',
                'image_url' => 'https://images.unsplash.com/photo-1589941013453-ec89f33b5e95?auto=format&fit=crop&w=800&q=80', // German Shepherd
                'status' => 'Adoptable',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Milo',
                'breed' => 'Beagle',
                'age' => 2,
                'condition' => 'Healthy',
                'rescue_team' => 'Team Delta',
                'image_url' => 'https://images.unsplash.com/photo-1537151608828-ea2b11777ee8?auto=format&fit=crop&w=800&q=80', // Beagle/Hound
                'status' => 'Adoptable',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cleo',
                'breed' => 'Siamese Cat',
                'age' => 4,
                'condition' => 'Healthy',
                'rescue_team' => 'Cat Rescue Unit',
                'image_url' => 'https://images.unsplash.com/photo-1513245543132-31f507417b26?auto=format&fit=crop&w=800&q=80', // Siamese/White cat
                'status' => 'Adoptable',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Daisy',
                'breed' => 'Poodle Mix',
                'age' => 6,
                'condition' => 'Senior Care',
                'rescue_team' => 'Team Beta',
                'image_url' => 'https://images.unsplash.com/photo-1583511655857-d19b40a7a54e?auto=format&fit=crop&w=800&q=80', // Cute fluffy dog
                'status' => 'Adoptable',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Charlie',
                'breed' => 'Husky',
                'age' => 2,
                'condition' => 'High Energy',
                'rescue_team' => 'Team Alpha',
                'image_url' => 'https://images.unsplash.com/photo-1547407139-3c921a66005c?auto=format&fit=crop&w=800&q=80', // Husky
                'status' => 'Adoptable',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Simba',
                'breed' => 'Ginger Cat',
                'age' => 1,
                'condition' => 'Healthy',
                'rescue_team' => 'Cat Rescue Unit',
                'image_url' => 'https://images.unsplash.com/photo-1574158622682-e40e69881006?auto=format&fit=crop&w=800&q=80', // Ginger cat
                'status' => 'Adoptable',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}