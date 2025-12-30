<?php

namespace Database\Seeders;

use App\Models\AnimalReport;
use Illuminate\Database\Seeder;

class AnimalReportsSeeder extends Seeder
{
    public function run()
    {
        $reports = [
            [
                'animal_type' => 'Sick/Injured',
                'description' => 'Found a limping dog near Central Park. Seems to have an injured front leg.',
                'location' => 'Central Park, Main Entrance',
                'last_seen' => now()->subHours(2),
                'contact_name' => 'John Doe',
                'contact_phone' => '555-1234',
                'contact_email' => 'john@example.com',
                'report_id' => 'SP-ABC12345',
                'status' => 'in_progress'
            ],
            [
                'animal_type' => 'Stray/Lost',
                'description' => 'Friendly cat without collar, appears lost. Hanging around 5th Avenue.',
                'location' => '5th Avenue & 42nd Street',
                'last_seen' => now()->subDays(1),
                'contact_name' => 'Jane Smith',
                'contact_phone' => '555-5678',
                'contact_email' => 'jane@example.com',
                'report_id' => 'SP-DEF67890',
                'status' => 'resolved'
            ],
            [
                'animal_type' => 'Aggressive',
                'description' => 'Dog showing aggressive behavior near school. Please handle with caution.',
                'location' => 'Maple Street Elementary School',
                'last_seen' => now()->subHours(1),
                'contact_name' => 'Mike Johnson',
                'contact_phone' => '555-9012',
                'contact_email' => 'mike@example.com',
                'report_id' => 'SP-GHI34567',
                'status' => 'pending'
            ],
            [
                'animal_type' => 'Abandoned',
                'description' => 'Kittens left in a box near the supermarket. Approximately 4 weeks old.',
                'location' => 'SuperMart Parking Lot',
                'last_seen' => now()->subHours(3),
                'contact_name' => 'Sarah Williams',
                'contact_phone' => '555-3456',
                'contact_email' => 'sarah@example.com',
                'report_id' => 'SP-JKL89012',
                'status' => 'in_progress'
            ],
        ];

        foreach ($reports as $report) {
            AnimalReport::create($report);
        }

        $this->command->info('Sample animal reports created successfully!');
    }
}