<?php
// database/seeders/AnimalReportsSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Faker\Factory as Faker;

class AnimalReportsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        
        // Clear existing data (optional)
        DB::table('animal_reports')->truncate();
        
        // Generate 50 sample reports
        $reports = [];
        
        $animalTypes = ['Aggressive', 'Sick/Injured', 'Stray/Lost', 'Abandoned'];
        $statuses = ['Pending', 'Under Review', 'Rescue Dispatched', 'Rescued', 'Closed'];
        $locations = [
            'Central Park, New York',
            'Golden Gate Park, San Francisco',
            'Lincoln Park, Chicago',
            'Griffith Park, Los Angeles',
            'Discovery Park, Seattle',
            'Fairmount Park, Philadelphia',
            'Zilker Park, Austin',
            'Balboa Park, San Diego',
            'Forest Park, Portland',
            'Washington Park, Denver'
        ];
        
        // Photo URLs from Unsplash (animal photos)
        $photoUrls = [
            'https://images.unsplash.com/photo-1543466835-00a7907e9de1',
            'https://images.unsplash.com/photo-1514888286974-6d03bde4ba42',
            'https://images.unsplash.com/photo-1513360371669-4adf3dd7dff8',
            'https://images.unsplash.com/photo-1513245543132-31f507417b26',
            'https://images.unsplash.com/photo-1507146426996-ef05306b995a',
            'https://images.unsplash.com/photo-1511275539165-cc46b1ee89bf',
            'https://images.unsplash.com/photo-1561037404-61cd46aa615b',
            'https://images.unsplash.com/photo-1583337130417-3346a1be7dee',
            'https://images.unsplash.com/photo-1537151625747-768eb6cf92b2',
            'https://images.unsplash.com/photo-1552053831-71594a27632d'
        ];
        
        $photoExtensions = ['.jpg', '.jpeg', '.png', '.webp'];
        $contentTypes = ['image/jpeg', 'image/png', 'image/webp'];
        
        // Create sequence for report IDs
        $this->createReportIdSequence();
        
        for ($i = 1; $i <= 50; $i++) {
            $animalType = $faker->randomElement($animalTypes);
            $location = $faker->randomElement($locations);
            $status = $faker->randomElement($statuses);
            $priority = $this->determinePriority($animalType, $status);
            
            // Generate realistic descriptions based on animal type
            $description = $this->generateDescription($animalType, $faker);
            
            // Determine if contact info is provided (70% chance)
            $hasContactInfo = $faker->boolean(70);
            
            // Random photo selection
            $hasPhoto = $faker->boolean(90);
            $photoUrl = $hasPhoto ? $faker->randomElement($photoUrls) . $faker->randomElement($photoExtensions) : null;
            
            $reports[] = [
                'animal_type' => $animalType,
                'description' => $description,
                'location' => $location,
                'last_seen' => $faker->dateTimeBetween('-30 days', 'now'),
                'animal_photo_url' => $photoUrl,
                'photo_file_name' => $hasPhoto ? 'animal_' . $faker->unique()->numberBetween(1000, 9999) . $faker->randomElement($photoExtensions) : null,
                'photo_file_size' => $hasPhoto ? $faker->numberBetween(100000, 5000000) : null,
                'photo_content_type' => $hasPhoto ? $faker->randomElement($contentTypes) : null,
                'contact_name' => $hasContactInfo ? $faker->name : null,
                'contact_phone' => $hasContactInfo && $faker->boolean(60) ? $faker->phoneNumber : null,
                'contact_email' => $hasContactInfo && $faker->boolean(80) ? $faker->safeEmail : null,
                'status' => $status,
                'priority' => $priority,
                'created_at' => $faker->dateTimeBetween('-90 days', 'now'),
                'updated_at' => $faker->dateTimeBetween('-60 days', 'now'),
                'submitted_ip' => $faker->ipv4,
                'user_agent' => $faker->userAgent,
                'terms_accepted' => true,
                'coordinates' => $this->generateCoordinates($location),
                'address_details' => $this->generateAddressDetails($location, $faker),
            ];
            
            // Show progress
            if ($i % 10 === 0) {
                $this->command->info("Generated {$i} animal reports...");
            }
        }
        
        // Insert all reports
        DB::table('animal_reports')->insert($reports);
        
        $this->command->info('✅ Successfully seeded 50 animal reports!');
        
        // Generate report IDs in PostgreSQL style
        $this->updateReportIds();
    }
    
    /**
     * Create a sequence for report IDs (PostgreSQL style)
     */
    private function createReportIdSequence(): void
    {
        try {
            DB::statement('DROP SEQUENCE IF EXISTS report_id_seq');
            DB::statement('CREATE SEQUENCE report_id_seq START 1');
        } catch (\Exception $e) {
            $this->command->warn('Note: Sequence creation might not be supported in your database. Using alternative method.');
        }
    }
    
    /**
     * Generate realistic description based on animal type
     */
    private function generateDescription(string $animalType, $faker): string
    {
        $descriptions = [
            'Aggressive' => [
                'Growling and showing teeth when approached.',
                'Charging at people walking by.',
                'Barking aggressively and lunging on chain.',
                'Hissing and arching back, tail puffed up.',
                'Snapping at other animals in the area.',
            ],
            'Sick/Injured' => [
                'Limping on right front leg, appears painful.',
                'Visible wound on side, bleeding slightly.',
                'Difficulty breathing, coughing frequently.',
                'Matted fur, looks malnourished and weak.',
                'Eye appears infected with discharge.',
            ],
            'Stray/Lost' => [
                'Wandering alone, no collar or tags.',
                'Approaching people looking for food.',
                'Appears confused and disoriented.',
                'Hiding under cars, seems frightened.',
                'Well-groomed but no owner in sight.',
            ],
            'Abandoned' => [
                'Left in cardboard box with blanket.',
                'Tied to pole with note attached.',
                'Cage left in parking lot overnight.',
                'Multiple animals left in abandoned house.',
                'Pet carrier dumped near dumpster.',
            ],
        ];
        
        $base = $descriptions[$animalType][array_rand($descriptions[$animalType])];
        
        $colors = ['black', 'white', 'brown', 'gray', 'orange', 'calico', 'brindle', 'spotted'];
        $breeds = [
            'dogs' => ['Labrador', 'German Shepherd', 'Golden Retriever', 'Beagle', 'Poodle', 'Bulldog'],
            'cats' => ['Domestic Shorthair', 'Siamese', 'Persian', 'Maine Coon', 'Tabby'],
            'others' => ['Rabbit', 'Squirrel', 'Raccoon', 'Fox', 'Deer']
        ];
        
        $animal = $faker->randomElement(['dog', 'cat', $faker->randomElement(['rabbit', 'squirrel'])]);
        $color = $faker->randomElement($colors);
        $size = $faker->randomElement(['small', 'medium', 'large']);
        $age = $faker->randomElement(['young', 'adult', 'senior']);
        
        $breed = match($animal) {
            'dog' => $faker->randomElement($breeds['dogs']),
            'cat' => $faker->randomElement($breeds['cats']),
            default => $faker->randomElement($breeds['others']),
        };
        
        return ucfirst("{$size} {$color} {$breed} {$animal}. {$base} " . $faker->sentence(10));
    }
    
    /**
     * Determine priority based on animal type and status
     */
    private function determinePriority(string $animalType, string $status): int
    {
        // Higher priority for aggressive or sick animals
        $basePriority = match($animalType) {
            'Aggressive' => $status === 'Pending' ? 1 : 2,
            'Sick/Injured' => $status === 'Pending' ? 2 : 3,
            default => $status === 'Pending' ? 3 : 4,
        };
        
        // Adjust based on status
        return match($status) {
            'Rescue Dispatched' => 1,
            'Under Review' => $basePriority - 1,
            'Rescued' => 5,
            'Closed' => 5,
            default => $basePriority,
        };
    }
    
    /**
     * Generate coordinates based on location
     */
    private function generateCoordinates(string $location): ?string
    {
        $coordinates = [
            'Central Park, New York' => '(40.7829, -73.9654)',
            'Golden Gate Park, San Francisco' => '(37.7694, -122.4862)',
            'Lincoln Park, Chicago' => '(41.9216, -87.6346)',
            'Griffith Park, Los Angeles' => '(34.1367, -118.2928)',
            'Discovery Park, Seattle' => '(47.6561, -122.4068)',
            'Fairmount Park, Philadelphia' => '(39.9788, -75.1937)',
            'Zilker Park, Austin' => '(30.2672, -97.7686)',
            'Balboa Park, San Diego' => '(32.7338, -117.1447)',
            'Forest Park, Portland' => '(45.5189, -122.7050)',
            'Washington Park, Denver' => '(39.7343, -105.0374)',
        ];
        
        return $coordinates[$location] ?? null;
    }
    
    /**
     * Generate address details as JSON
     */
    private function generateAddressDetails(string $location, $faker): ?string
    {
        $cityState = [
            'Central Park, New York' => ['city' => 'New York', 'state' => 'NY', 'zip' => '10028'],
            'Golden Gate Park, San Francisco' => ['city' => 'San Francisco', 'state' => 'CA', 'zip' => '94122'],
            'Lincoln Park, Chicago' => ['city' => 'Chicago', 'state' => 'IL', 'zip' => '60614'],
            'Griffith Park, Los Angeles' => ['city' => 'Los Angeles', 'state' => 'CA', 'zip' => '90027'],
            'Discovery Park, Seattle' => ['city' => 'Seattle', 'state' => 'WA', 'zip' => '98199'],
            'Fairmount Park, Philadelphia' => ['city' => 'Philadelphia', 'state' => 'PA', 'zip' => '19131'],
            'Zilker Park, Austin' => ['city' => 'Austin', 'state' => 'TX', 'zip' => '78746'],
            'Balboa Park, San Diego' => ['city' => 'San Diego', 'state' => 'CA', 'zip' => '92101'],
            'Forest Park, Portland' => ['city' => 'Portland', 'state' => 'OR', 'zip' => '97210'],
            'Washington Park, Denver' => ['city' => 'Denver', 'state' => 'CO', 'zip' => '80209'],
        ];
        
        $details = $cityState[$location] ?? ['city' => 'Unknown', 'state' => 'XX', 'zip' => '00000'];
        
        $details['landmark'] = $location;
        $details['street'] = $faker->streetAddress;
        $details['country'] = 'USA';
        $details['formatted_address'] = "{$details['street']}, {$details['city']}, {$details['state']} {$details['zip']}";
        
        return json_encode($details);
    }
    
    /**
     * Update report IDs after insertion (PostgreSQL style)
     */
    private function updateReportIds(): void
    {
        try {
            $reports = DB::table('animal_reports')->orderBy('id')->get();
            
            foreach ($reports as $index => $report) {
                $year = Carbon::parse($report->created_at)->format('Y');
                $sequenceNum = str_pad($index + 1, 5, '0', STR_PAD_LEFT);
                $reportId = "SP-{$year}-{$sequenceNum}";
                
                DB::table('animal_reports')
                    ->where('id', $report->id)
                    ->update(['report_id' => $reportId]);
            }
            
            $this->command->info('✅ Report IDs updated successfully!');
        } catch (\Exception $e) {
            $this->command->error('Failed to update report IDs: ' . $e->getMessage());
        }
    }
}