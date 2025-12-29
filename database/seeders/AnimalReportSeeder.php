<?php

namespace Database\Seeders;

use App\Models\AnimalReport;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class AnimalReportsSeeder extends Seeder
{
    public function run(): void
    {
        $reports = [
            [
                'report_id' => 'SP-20241228-2835A7',
                'animal_type' => 'Sick/Injured',
                'description' => 'Medium-sized brown dog, appears dirty and injured, limping on front left leg',
                'location' => 'Central Park, near the fountain',
                'last_seen' => Carbon::parse('2025-12-28 21:58:00'),
                'contact_name' => 'Rose Mamy',
                'contact_phone' => '0755028786',
                'contact_email' => 'rose2335041@gmail.com',
                'status' => 'rescued',
                'notes' => 'Rescue team located the dog. Front left leg appears injured. Administered first aid.',
                'created_at' => Carbon::parse('2025-12-28 21:58:00'),
                'expires_at' => Carbon::parse('2026-01-27 21:58:00'),
            ],
            [
                'report_id' => 'SP-20241227-8C2D9F',
                'animal_type' => 'Stray/Lost',
                'description' => 'Small black and white cat, appears hungry and lost, no collar',
                'location' => 'Maple Street, near the grocery store',
                'last_seen' => Carbon::parse('2025-12-27 15:20:00'),
                'contact_name' => 'John Smith',
                'contact_phone' => '0712345678',
                'contact_email' => 'john.smith@email.com',
                'status' => 'completed',
                'notes' => 'Cat rescued and adopted by local family.',
                'created_at' => Carbon::parse('2025-12-27 15:20:00'),
                'expires_at' => Carbon::parse('2026-01-26 15:20:00'),
            ],
            [
                'report_id' => 'SP-20241226-4E9F2B',
                'animal_type' => 'Aggressive/Dangerous',
                'description' => 'Large stray dog showing aggressive behavior near school',
                'location' => 'Near City Elementary School',
                'last_seen' => Carbon::parse('2025-12-26 11:45:00'),
                'contact_name' => 'Sarah Johnson',
                'contact_phone' => '0723456789',
                'contact_email' => 'sarah.j@email.com',
                'status' => 'team_dispatched',
                'notes' => 'Emergency response team dispatched. Caution advised.',
                'created_at' => Carbon::parse('2025-12-26 11:45:00'),
                'expires_at' => Carbon::parse('2026-01-25 11:45:00'),
            ],
            [
                'report_id' => 'SP-20241225-1A7B3C',
                'animal_type' => 'Abandoned',
                'description' => 'Puppy left in a box near the park entrance',
                'location' => 'Riverside Park entrance',
                'last_seen' => Carbon::parse('2025-12-25 09:30:00'),
                'contact_name' => 'Michael Brown',
                'contact_phone' => '0734567890',
                'contact_email' => 'michael.b@email.com',
                'status' => 'under_review',
                'notes' => 'Report received, assessing situation.',
                'created_at' => Carbon::parse('2025-12-25 09:30:00'),
                'expires_at' => Carbon::parse('2026-01-24 09:30:00'),
            ],
            [
                'report_id' => 'SP-20241224-5D8E1F',
                'animal_type' => 'Sick/Injured',
                'description' => 'Bird with broken wing, unable to fly',
                'location' => 'Backyard, Oak Street',
                'last_seen' => Carbon::parse('2025-12-24 14:15:00'),
                'contact_name' => 'Emma Wilson',
                'contact_phone' => '0745678901',
                'contact_email' => 'emma.w@email.com',
                'status' => 'submitted',
                'notes' => 'Awaiting volunteer availability.',
                'created_at' => Carbon::parse('2025-12-24 14:15:00'),
                'expires_at' => Carbon::parse('2026-01-23 14:15:00'),
            ],
        ];

        foreach ($reports as $report) {
            AnimalReport::create($report);
        }

        $this->command->info('✅ 5 sample animal reports seeded successfully!');
    }
}