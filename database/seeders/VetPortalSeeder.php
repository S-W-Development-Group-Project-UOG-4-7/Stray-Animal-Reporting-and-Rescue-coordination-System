<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Veterinarian;
use App\Models\Animal;
use App\Models\VetAppointment;
use App\Models\AnimalHealthRecord;
use Illuminate\Support\Facades\Hash;

class VetPortalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Create Vet User
        $user = User::firstOrCreate(
            ['email' => 'vet@safepaws.com'],
            [
                'name' => 'Dr. Sarah Smith',
                'username' => 'drsarah',
                'password' => Hash::make('password'),
                'role' => 'veterinarian',
                'phone' => '0771234567',
                'address' => 'Colombo 07',
            ]
        );

        // 2. Create Linked Veterinarian Profile
        $vet = Veterinarian::firstOrCreate(
            ['user_id' => $user->id],
            [
                'name' => $user->name,
                'clinic' => 'PetCare Clinic',
                'phone' => $user->phone,
                'email' => $user->email,
                'specialization' => 'General Practitioner',
                'status' => 'Active',
            ]
        );

        // 3. Ensure some animals exist
        if (Animal::count() == 0) {
            Animal::create([
                'name' => 'Lucky',
                'species' => 'Dog',
                'age' => 3,
                'status' => 'Rescued',
                'description' => 'Found near park',
            ]);
            Animal::create([
                'name' => 'Whiskers',
                'species' => 'Cat',
                'age' => 2,
                'status' => 'In Treatment',
                'description' => 'Injured leg',
            ]);
        }
        $animals = Animal::all();

        // 4. Create Appointments
        VetAppointment::create([
            'veterinarian_id' => $vet->id,
            'animal_id' => $animals->random()->id,
            'appointment_date' => now()->addDays(1)->setHour(10)->setMinute(0),
            'type' => 'Checkup',
            'status' => 'scheduled',
            'notes' => 'General health check',
        ]);

        VetAppointment::create([
            'veterinarian_id' => $vet->id,
            'animal_id' => $animals->random()->id,
            'appointment_date' => now()->addDays(2)->setHour(14)->setMinute(30),
            'type' => 'Vaccination',
            'status' => 'scheduled',
            'notes' => 'Annual booster',
        ]);

        // 5. Create Health Records
        AnimalHealthRecord::create([
            'animal_id' => $animals->random()->id,
            'veterinarian_id' => $vet->id,
            'diagnosis' => 'Mild Infection',
            'treatment' => 'Antibiotics prescribed',
            'notes' => 'Review in 1 week',
        ]);
    }
}