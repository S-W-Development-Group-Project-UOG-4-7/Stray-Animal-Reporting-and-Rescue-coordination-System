<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmergencyContactsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('emergency_contacts')->insert([
            [
                'name' => 'Emergency Hotline',
                'phone' => '(555) 911-ANIMAL',
                'email' => 'emergency@safepaws.org',
                'department' => '24/7 Emergency',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'John Rescue',
                'phone' => '(555) 123-4567',
                'email' => 'john@safepaws.org',
                'department' => 'Rescue Operations',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sarah Medical',
                'phone' => '(555) 234-5678',
                'email' => 'sarah@safepaws.org',
                'department' => 'Medical Team',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mike Dispatch',
                'phone' => '(555) 345-6789',
                'email' => 'mike@safepaws.org',
                'department' => 'Dispatch Center',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}