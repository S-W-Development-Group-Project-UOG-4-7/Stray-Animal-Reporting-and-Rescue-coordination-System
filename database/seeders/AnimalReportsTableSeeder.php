<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AnimalReportsTableSeeder extends Seeder
{
    private $animalTypes = ['Aggressive', 'Sick/Injured', 'Stray/Lost', 'Abandoned'];
    private $locations = ['Colombo', 'Kandy', 'Galle', 'Negombo', 'Jaffna', 'Trincomalee'];
    private $statuses = ['pending', 'under_review', 'rescue_dispatched', 'rescue_completed', 'closed'];

    public function run()
    {
        for ($i = 1; $i <= 50; $i++) {
            $reportId = 'SP-' . date('Y') . '-' . str_pad($i, 5, '0', STR_PAD_LEFT);
            $status = $this->statuses[array_rand($this->statuses)];
            $createdAt = now()->subDays(rand(0, 60));
            
            // Calculate expires_at (30 days from creation)
            $expiresAt = (clone $createdAt)->addDays(30);
            
            // Determine if report should be active based on expiration
            $isActive = $expiresAt->isFuture();
            
            DB::table('animal_reports')->insert([
                'report_id' => $reportId,
                'animal_type' => $this->animalTypes[array_rand($this->animalTypes)],
                'description' => 'Animal found in ' . $this->locations[array_rand($this->locations)] . '. ' .
                                'Description: ' . $this->getRandomDescription(),
                'location' => $this->locations[array_rand($this->locations)],
                'last_seen' => now()->subHours(rand(1, 72)),
                'animal_photo' => rand(0, 1) ? 'uploads/animals/animal' . rand(1, 10) . '.jpg' : null,
                'contact_name' => 'User ' . rand(1, 20),
                'contact_phone' => '+9477' . rand(1000000, 9999999),
                'contact_email' => 'user' . rand(1, 20) . '@example.com',
                'status' => $status,
                'is_active' => $isActive,
                'expires_at' => $expiresAt,
                'admin_notes' => $status === 'closed' ? 'Case resolved successfully. Animal rescued and treated.' : null,
                'created_at' => $createdAt,
                'updated_at' => now(),
            ]);
        }
    }

    private function getRandomDescription()
    {
        $descriptions = [
            'Medium sized brown dog with white patches.',
            'Small black and white cat with green eyes.',
            'Large mixed breed dog, appears friendly.',
            'Kitten found alone, crying for mother.',
            'Adult cat with injured leg, limping.',
            'Dog with collar but no tags.',
            'Puppy abandoned in cardboard box.',
            'Senior dog with gray muzzle.',
            'Cat stuck on tree branch.',
            'Dog wandering near highway.'
        ];
        return $descriptions[array_rand($descriptions)];
    }
}