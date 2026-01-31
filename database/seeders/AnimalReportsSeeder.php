<?php

namespace Database\Seeders;

use App\Models\AnimalReport;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AnimalReportsSeeder extends Seeder
{
    public function run()
    {
        // Clear existing data
        AnimalReport::truncate();

        $reports = [
            [
                'animal_species' => 'Dog',
                'animal_type' => 'Sick/Injured',
                'other_species' => null,
                'description' => 'Found a limping golden retriever near Central Park. Seems to have an injured front leg.',
                'animal_photo' => 'storage/animal-photos/dog1.jpg',
                
                // New location fields
                'latitude' => 6.9271,
                'longitude' => 79.8612,
                'urgency' => 'high',
                'formatted_address' => 'Central Park, Colombo 00700, Sri Lanka',
                'place_id' => 'ChIJ9fSgQ0tU4joRtXiU-pbMsh8',
                'location' => 'Central Park, Main Entrance',
                
                'last_seen' => Carbon::now()->subHours(2),
                'contact_name' => 'John Doe',
                'contact_phone' => '555-1234',
                'contact_email' => 'john@example.com',
                'terms_accepted' => true,
                'report_id' => AnimalReport::generateReportId(),
                'status' => 'processing',
                'expires_at' => Carbon::now()->addDays(30),
                'created_at' => Carbon::now()->subHours(2),
                'updated_at' => Carbon::now()->subHours(1),
            ],
            [
                'animal_species' => 'Cat',
                'animal_type' => 'Stray/Lost',
                'other_species' => null,
                'description' => 'Friendly tabby cat without collar, appears lost. Hanging around 5th Avenue.',
                'animal_photo' => 'storage/animal-photos/cat1.jpg',
                
                'latitude' => 6.9350,
                'longitude' => 79.8665,
                'urgency' => 'medium',
                'formatted_address' => '42nd Street, Colombo 00300, Sri Lanka',
                'place_id' => 'ChIJy8fU50tU4joR2SsGwQlbp7c',
                'location' => '5th Avenue & 42nd Street',
                
                'last_seen' => Carbon::now()->subDays(1),
                'contact_name' => 'Jane Smith',
                'contact_phone' => '555-5678',
                'contact_email' => 'jane@example.com',
                'terms_accepted' => true,
                'report_id' => AnimalReport::generateReportId(),
                'status' => 'rescued',
                'expires_at' => Carbon::now()->addDays(30),
                'created_at' => Carbon::now()->subDays(1),
                'updated_at' => Carbon::now()->subHours(6),
            ],
            [
                'animal_species' => 'Dog',
                'animal_type' => 'Aggressive',
                'other_species' => null,
                'description' => 'Large German Shepherd showing aggressive behavior near school. Please handle with caution.',
                'animal_photo' => 'storage/animal-photos/dog2.jpg',
                
                'latitude' => 6.8995,
                'longitude' => 79.8694,
                'urgency' => 'emergency',
                'formatted_address' => 'Maple Street, Nugegoda 10250, Sri Lanka',
                'place_id' => 'ChIJp6fSxUtU4joRmnGwQlbp7c',
                'location' => 'Maple Street Elementary School',
                
                'last_seen' => Carbon::now()->subHours(1),
                'contact_name' => 'Mike Johnson',
                'contact_phone' => '555-9012',
                'contact_email' => 'mike@example.com',
                'terms_accepted' => true,
                'report_id' => AnimalReport::generateReportId(),
                'status' => 'dispatched',
                'expires_at' => Carbon::now()->addDays(30),
                'created_at' => Carbon::now()->subHours(1),
                'updated_at' => Carbon::now()->subMinutes(30),
            ],
            [
                'animal_species' => 'Cat',
                'animal_type' => 'Abandoned',
                'other_species' => null,
                'description' => 'Three gray kittens left in a cardboard box near the supermarket. Approximately 4 weeks old.',
                'animal_photo' => 'storage/animal-photos/kittens.jpg',
                
                'latitude' => 6.9102,
                'longitude' => 79.8876,
                'urgency' => 'high',
                'formatted_address' => 'SuperMart, Kiribathgoda 11600, Sri Lanka',
                'place_id' => 'ChIJt6fS50tU4joRlD3GwQlbp7c',
                'location' => 'SuperMart Parking Lot',
                
                'last_seen' => Carbon::now()->subHours(3),
                'contact_name' => 'Sarah Williams',
                'contact_phone' => '555-3456',
                'contact_email' => 'sarah@example.com',
                'terms_accepted' => true,
                'report_id' => AnimalReport::generateReportId(),
                'status' => 'pending',
                'expires_at' => Carbon::now()->addDays(30),
                'created_at' => Carbon::now()->subHours(3),
                'updated_at' => Carbon::now()->subHours(2),
            ],
            [
                'animal_species' => 'Other',
                'animal_type' => 'Sick/Injured',
                'other_species' => 'Rabbit',
                'description' => 'Wild rabbit with injured hind leg, hopping slowly near the park bench.',
                'animal_photo' => 'storage/animal-photos/rabbit.jpg',
                
                'latitude' => 6.9467,
                'longitude' => 79.8718,
                'urgency' => 'medium',
                'formatted_address' => 'Green Meadows Park, Battaramulla 10120, Sri Lanka',
                'place_id' => 'ChIJv6fS50tU4joRrT3GwQlbp7c',
                'location' => 'Green Meadows Park, Near Fountain',
                
                'last_seen' => Carbon::now()->subHours(4),
                'contact_name' => 'Robert Chen',
                'contact_phone' => '555-7890',
                'contact_email' => 'robert@example.com',
                'terms_accepted' => true,
                'report_id' => AnimalReport::generateReportId(),
                'status' => 'pending',
                'expires_at' => Carbon::now()->addDays(30),
                'created_at' => Carbon::now()->subHours(4),
                'updated_at' => Carbon::now()->subHours(4),
            ],
            [
                'animal_species' => 'Other',
                'animal_type' => 'Sick/Injured',
                'other_species' => 'Bird',
                'description' => 'Small sparrow with damaged wing, unable to fly. Located near bird feeder.',
                'animal_photo' => 'storage/animal-photos/bird.jpg',
                
                'latitude' => 6.8805,
                'longitude' => 79.9018,
                'urgency' => 'low',
                'formatted_address' => '123 Garden Lane, Dehiwala 10350, Sri Lanka',
                'place_id' => 'ChIJy6fS50tU4joRlH3GwQlbp7c',
                'location' => '123 Garden Lane, Backyard',
                
                'last_seen' => Carbon::now()->subHours(1),
                'contact_name' => 'Emma Wilson',
                'contact_phone' => '555-2345',
                'contact_email' => 'emma@example.com',
                'terms_accepted' => true,
                'report_id' => AnimalReport::generateReportId(),
                'status' => 'completed',
                'expires_at' => Carbon::now()->addDays(30),
                'created_at' => Carbon::now()->subHours(1),
                'updated_at' => Carbon::now()->subMinutes(45),
            ],
            [
                'animal_species' => 'Dog',
                'animal_type' => 'Stray/Lost',
                'other_species' => null,
                'description' => 'Small beagle wandering alone, looks confused and hungry. Very friendly.',
                'animal_photo' => 'storage/animal-photos/beagle.jpg',
                
                'latitude' => 6.8321,
                'longitude' => 79.8822,
                'urgency' => 'medium',
                'formatted_address' => 'River Road, Moratuwa 10400, Sri Lanka',
                'place_id' => 'ChIJz6fS50tU4joRlL3GwQlbp7c',
                'location' => 'River Road, Near Bridge',
                
                'last_seen' => Carbon::now()->subDays(2),
                'contact_name' => 'David Brown',
                'contact_phone' => '555-6789',
                'contact_email' => 'david@example.com',
                'terms_accepted' => true,
                'report_id' => AnimalReport::generateReportId(),
                'status' => 'rescued',
                'expires_at' => Carbon::now()->addDays(30),
                'created_at' => Carbon::now()->subDays(2),
                'updated_at' => Carbon::now()->subDays(1),
            ],
            [
                'animal_species' => 'Cat',
                'animal_type' => 'Sick/Injured',
                'other_species' => null,
                'description' => 'Persian cat with eye infection, seems disoriented and weak.',
                'animal_photo' => 'storage/animal-photos/cat2.jpg',
                
                'latitude' => 6.8559,
                'longitude' => 79.8984,
                'urgency' => 'high',
                'formatted_address' => 'Oak Street, Mount Lavinia 10370, Sri Lanka',
                'place_id' => 'ChIJ16fS50tU4joRlM3GwQlbp7c',
                'location' => 'Oak Street, Alley behind Cafe',
                
                'last_seen' => Carbon::now()->subHours(6),
                'contact_name' => 'Lisa Taylor',
                'contact_phone' => '555-4321',
                'contact_email' => 'lisa@example.com',
                'terms_accepted' => true,
                'report_id' => AnimalReport::generateReportId(),
                'status' => 'processing',
                'expires_at' => Carbon::now()->addDays(30),
                'created_at' => Carbon::now()->subHours(6),
                'updated_at' => Carbon::now()->subHours(4),
            ],
            [
                'animal_species' => 'Other',
                'animal_type' => 'Sick/Injured',
                'other_species' => 'Squirrel',
                'description' => 'Squirrel appears lethargic and not moving properly. May be injured.',
                'animal_photo' => 'storage/animal-photos/squirrel.jpg',
                
                'latitude' => 6.9023,
                'longitude' => 79.9173,
                'urgency' => 'low',
                'formatted_address' => 'Pine Tree Park, Maharagama 10280, Sri Lanka',
                'place_id' => 'ChIJ26fS50tU4joRlN3GwQlbp7c',
                'location' => 'Pine Tree Park, Near Playground',
                
                'last_seen' => Carbon::now()->subHours(2),
                'contact_name' => 'Tom Anderson',
                'contact_phone' => '555-8765',
                'contact_email' => 'tom@example.com',
                'terms_accepted' => true,
                'report_id' => AnimalReport::generateReportId(),
                'status' => 'pending',
                'expires_at' => Carbon::now()->addDays(30),
                'created_at' => Carbon::now()->subHours(2),
                'updated_at' => Carbon::now()->subHours(2),
            ],
            [
                'animal_species' => 'Dog',
                'animal_type' => 'Abandoned',
                'other_species' => null,
                'description' => 'Puppy tied to a pole with a note saying "Please take care of me".',
                'animal_photo' => 'storage/animal-photos/puppy.jpg',
                
                'latitude' => 6.9125,
                'longitude' => 79.8486,
                'urgency' => 'high',
                'formatted_address' => 'Colombo Public Library, Colombo 00700, Sri Lanka',
                'place_id' => 'ChIJ36fS50tU4joRlO3GwQlbp7c',
                'location' => 'City Library Main Entrance',
                
                'last_seen' => Carbon::now()->subHours(5),
                'contact_name' => 'Maria Garcia',
                'contact_phone' => '555-9876',
                'contact_email' => 'maria@example.com',
                'terms_accepted' => true,
                'report_id' => AnimalReport::generateReportId(),
                'status' => 'rescued',
                'expires_at' => Carbon::now()->addDays(30),
                'created_at' => Carbon::now()->subHours(5),
                'updated_at' => Carbon::now()->subHours(2),
            ],
            [
                'animal_species' => 'Dog',
                'animal_type' => 'Aggressive',
                'other_species' => null,
                'description' => 'Pit bull showing signs of rabies, foaming at mouth. Extremely dangerous situation.',
                'animal_photo' => 'storage/animal-photos/pitbull.jpg',
                
                'latitude' => 6.9348,
                'longitude' => 79.8501,
                'urgency' => 'emergency',
                'formatted_address' => 'Industrial Zone, Colombo 00200, Sri Lanka',
                'place_id' => 'ChIJ46fS50tU4joRlP3GwQlbp7c',
                'location' => 'Industrial Zone, Warehouse 5',
                
                'last_seen' => Carbon::now()->subHours(3),
                'contact_name' => 'Security Guard',
                'contact_phone' => '555-1111',
                'contact_email' => 'guard@example.com',
                'terms_accepted' => true,
                'report_id' => AnimalReport::generateReportId(),
                'status' => 'dispatched',
                'expires_at' => Carbon::now()->addDays(30),
                'created_at' => Carbon::now()->subHours(3),
                'updated_at' => Carbon::now()->subHours(2),
            ],
            [
                'animal_species' => 'Cat',
                'animal_type' => 'Stray/Lost',
                'other_species' => null,
                'description' => 'Siamese cat with blue collar, looks well-groomed but scared.',
                'animal_photo' => 'storage/animal-photos/siamese.jpg',
                
                'latitude' => 6.9001,
                'longitude' => 79.8592,
                'urgency' => 'medium',
                'formatted_address' => 'Maple Street, Rajagiriya 10107, Sri Lanka',
                'place_id' => 'ChIJ56fS50tU4joRlQ3GwQlbp7c',
                'location' => 'Residential Area, Maple Street',
                
                'last_seen' => Carbon::now()->subHours(8),
                'contact_name' => 'Mrs. Robinson',
                'contact_phone' => '555-2222',
                'contact_email' => 'robinson@example.com',
                'terms_accepted' => true,
                'report_id' => AnimalReport::generateReportId(),
                'status' => 'pending',
                'expires_at' => Carbon::now()->addDays(30),
                'created_at' => Carbon::now()->subHours(8),
                'updated_at' => Carbon::now()->subHours(7),
            ],
            [
                'animal_species' => 'Other',
                'animal_type' => 'Sick/Injured',
                'other_species' => 'Turtle',
                'description' => 'Turtle on back, cannot flip over. Stuck in hot pavement.',
                'animal_photo' => 'storage/animal-photos/turtle.jpg',
                
                'latitude' => 6.8219,
                'longitude' => 79.8712,
                'urgency' => 'low',
                'formatted_address' => 'Beach Road, Mount Lavinia 10370, Sri Lanka',
                'place_id' => 'ChIJ66fS50tU4joRlR3GwQlbp7c',
                'location' => 'Beach Road, near turtle crossing sign',
                
                'last_seen' => Carbon::now()->subHours(1),
                'contact_name' => 'Beach Patrol',
                'contact_phone' => '555-3333',
                'contact_email' => 'beach@example.com',
                'terms_accepted' => true,
                'report_id' => AnimalReport::generateReportId(),
                'status' => 'completed',
                'expires_at' => Carbon::now()->addDays(30),
                'created_at' => Carbon::now()->subHours(1),
                'updated_at' => Carbon::now()->subMinutes(30),
            ],
            [
                'animal_species' => 'Cat',
                'animal_type' => 'Stray/Lost',
                'other_species' => null,
                'description' => 'Older report - cat seen in park last month.',
                'animal_photo' => 'storage/animal-photos/oldcat.jpg',
                
                'latitude' => 6.9112,
                'longitude' => 79.8521,
                'urgency' => 'low',
                'formatted_address' => 'Viharamahadevi Park, Colombo 00700, Sri Lanka',
                'place_id' => 'ChIJ76fS50tU4joRlS3GwQlbp7c',
                'location' => 'City Park',
                
                'last_seen' => Carbon::now()->subDays(35),
                'contact_name' => 'Old Report',
                'contact_phone' => '555-0000',
                'contact_email' => 'old@example.com',
                'terms_accepted' => true,
                'report_id' => AnimalReport::generateReportId(),
                'status' => 'completed',
                'expires_at' => Carbon::now()->subDays(5),
                'created_at' => Carbon::now()->subDays(40),
                'updated_at' => Carbon::now()->subDays(35),
            ],
        ];

        foreach ($reports as $report) {
            AnimalReport::create($report);
        }

        $this->command->info('✅ Animal reports seeded successfully with Google Maps data!');
        $this->command->info('📊 Total reports created: ' . count($reports));
        $this->command->info('');
        $this->command->info('📍 Location Statistics:');
        $this->command->info('• Emergency reports: ' . AnimalReport::where('urgency', 'emergency')->count());
        $this->command->info('• High urgency: ' . AnimalReport::where('urgency', 'high')->count());
        $this->command->info('• Medium urgency: ' . AnimalReport::where('urgency', 'medium')->count());
        $this->command->info('• Low urgency: ' . AnimalReport::where('urgency', 'low')->count());
        $this->command->info('');
        $this->command->info('📝 Sample Reports for testing:');
        $this->command->info('• Emergency (Aggressive Dog): ' . AnimalReport::where('urgency', 'emergency')->first()->report_id);
        $this->command->info('• High (Sick Animal): ' . AnimalReport::where('urgency', 'high')->first()->report_id);
        $this->command->info('• Medium (Stray Animal): ' . AnimalReport::where('urgency', 'medium')->first()->report_id);
        $this->command->info('• Low (Minor Injury): ' . AnimalReport::where('urgency', 'low')->first()->report_id);
        $this->command->info('');
        $this->command->info('🔍 All reports include:');
        $this->command->info('• Latitude/Longitude coordinates');
        $this->command->info('• Google Place ID');
        $this->command->info('• Full formatted address');
        $this->command->info('• Urgency level (emergency, high, medium, low)');
        $this->command->info('• Terms acceptance flag');
    }
}