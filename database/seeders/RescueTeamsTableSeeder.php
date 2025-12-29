<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RescueTeamsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('rescue_teams')->insert([
            [
                'team_name' => 'Alpha Team',
                'location' => 'Colombo District',
                'contact_person' => 'Mike Wilson',
                'contact_phone' => '(555) 111-2222',
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'team_name' => 'Bravo Team',
                'location' => 'Kandy District',
                'contact_person' => 'Lisa Brown',
                'contact_phone' => '(555) 222-3333',
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'team_name' => 'Charlie Team',
                'location' => 'Galle District',
                'contact_person' => 'David Lee',
                'contact_phone' => '(555) 333-4444',
                'status' => 'busy',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'team_name' => 'Delta Team',
                'location' => 'Jaffna District',
                'contact_person' => 'Maria Garcia',
                'contact_phone' => '(555) 444-5555',
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}