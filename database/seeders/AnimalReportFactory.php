<?php
// database/factories/AnimalReportFactory.php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AnimalReportFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        $animalTypes = ['Aggressive', 'Sick/Injured', 'Stray/Lost', 'Abandoned'];
        $animalType = $this->faker->randomElement($animalTypes);
        
        return [
            'animal_type' => $animalType,
            'description' => $this->generateDescription($animalType),
            'location' => $this->faker->address,
            'last_seen' => $this->faker->dateTimeBetween('-30 days', 'now'),
            'animal_photo_url' => $this->faker->optional(0.9)->imageUrl(640, 480, 'animals'),
            'photo_file_name' => $this->faker->optional(0.9)->lexify('animal_??????.jpg'),
            'photo_file_size' => $this->faker->optional(0.9)->numberBetween(100000, 5000000),
            'photo_content_type' => $this->faker->optional(0.9)->randomElement(['image/jpeg', 'image/png', 'image/webp']),
            'contact_name' => $this->faker->optional(0.7)->name,
            'contact_phone' => $this->faker->optional(0.6)->phoneNumber,
            'contact_email' => $this->faker->optional(0.8)->safeEmail,
            'status' => $this->faker->randomElement(['Pending', 'Under Review', 'Rescue Dispatched', 'Rescued', 'Closed']),
            'priority' => $this->faker->numberBetween(1, 5),
            'submitted_ip' => $this->faker->ipv4,
            'user_agent' => $this->faker->userAgent,
            'terms_accepted' => true,
            'coordinates' => "({$this->faker->latitude}, {$this->faker->longitude})",
            'address_details' => json_encode([
                'street' => $this->faker->streetAddress,
                'city' => $this->faker->city,
                'state' => $this->faker->stateAbbr,
                'zip' => $this->faker->postcode,
                'country' => 'USA',
                'formatted_address' => $this->faker->address,
            ]),
            'created_at' => $this->faker->dateTimeBetween('-90 days', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-60 days', 'now'),
        ];
    }
    
    /**
     * Generate description based on animal type
     */
    private function generateDescription(string $animalType): string
    {
        $templates = [
            'Aggressive' => [
                'Animal showing aggressive behavior. {details}',
                'Report of dangerous animal. {details}',
                'Animal posing threat to public. {details}',
            ],
            'Sick/Injured' => [
                'Animal appears injured. {details}',
                'Sick animal needs assistance. {details}',
                'Injured animal spotted. {details}',
            ],
            'Stray/Lost' => [
                'Animal appears lost. {details}',
                'Stray animal wandering. {details}',
                'Lost pet reported. {details}',
            ],
            'Abandoned' => [
                'Animal appears abandoned. {details}',
                'Pet left behind. {details}',
                'Abandoned animal found. {details}',
            ],
        ];
        
        $template = $this->faker->randomElement($templates[$animalType]);
        
        $details = match($animalType) {
            'Aggressive' => $this->faker->randomElement([
                'Growling and showing teeth',
                'Charging at people',
                'Barking aggressively',
                'Hissing and arching back',
            ]),
            'Sick/Injured' => $this->faker->randomElement([
                'Limping on one leg',
                'Visible wound on side',
                'Difficulty breathing',
                'Appears malnourished',
            ]),
            'Stray/Lost' => $this->faker->randomElement([
                'Wandering alone',
                'Approaching people',
                'Appears confused',
                'No collar visible',
            ]),
            'Abandoned' => $this->faker->randomElement([
                'Left in cardboard box',
                'Tied to pole',
                'Cage left in parking lot',
                'Multiple animals together',
            ]),
        };
        
        $animal = $this->faker->randomElement(['dog', 'cat']);
        $color = $this->faker->colorName;
        $size = $this->faker->randomElement(['small', 'medium', 'large']);
        $breed = $animal === 'dog' 
            ? $this->faker->randomElement(['Labrador', 'German Shepherd', 'Beagle', 'Poodle'])
            : $this->faker->randomElement(['Domestic Shorthair', 'Siamese', 'Persian', 'Tabby']);
        
        return str_replace('{details}', 
            "{$size} {$color} {$breed} {$animal}. {$details}. " . $this->faker->sentence(8), 
            $template
        );
    }
}