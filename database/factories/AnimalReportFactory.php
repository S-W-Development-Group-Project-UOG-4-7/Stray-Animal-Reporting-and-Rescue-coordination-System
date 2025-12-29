<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AnimalReport>
 */
class AnimalReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $animalTypes = ['Aggressive', 'Sick/Injured', 'Stray/Lost', 'Abandoned', 'Other'];
        $statuses = ['pending', 'reviewing', 'dispatched', 'in_progress', 'resolved', 'cancelled'];
        
        return [
            'report_id' => 'SP-' . date('Y') . '-' . strtoupper($this->faker->bothify('?????##')),
            'animal_type' => $this->faker->randomElement($animalTypes),
            'description' => $this->faker->paragraph(),
            'location' => $this->faker->address(),
            'last_seen' => $this->faker->dateTimeBetween('-1 week', 'now'),
            'animal_photo' => $this->faker->optional()->imageUrl(640, 480, 'animal', true),
            'contact_name' => $this->faker->optional()->name(),
            'contact_phone' => $this->faker->optional()->phoneNumber(),
            'contact_email' => $this->faker->optional()->safeEmail(),
            'status' => $this->faker->randomElement($statuses),
            'admin_notes' => $this->faker->optional()->paragraph(),
            'assigned_to' => $this->faker->optional()->name(),
            'resolved_at' => $this->faker->optional()->dateTimeBetween('-1 week', 'now'),
            'response_time_minutes' => $this->faker->optional()->numberBetween(15, 480),
            'outcome' => $this->faker->optional()->sentence(),
            'ip_address' => $this->faker->ipv4(),
            'user_agent' => $this->faker->userAgent(),
        ];
    }

    /**
     * Indicate that the report is pending.
     */
    public function pending(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'pending',
            'resolved_at' => null,
            'response_time_minutes' => null,
            'outcome' => null,
        ]);
    }

    /**
     * Indicate that the report is resolved.
     */
    public function resolved(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'resolved',
            'resolved_at' => $this->faker->dateTimeBetween('-1 week', 'now'),
            'response_time_minutes' => $this->faker->numberBetween(15, 480),
            'outcome' => $this->faker->sentence(),
        ]);
    }

    /**
     * Indicate that the report is for an aggressive animal.
     */
    public function aggressive(): static
    {
        return $this->state(fn (array $attributes) => [
            'animal_type' => 'Aggressive',
        ]);
    }

    /**
     * Indicate that the report is for a sick/injured animal.
     */
    public function sick(): static
    {
        return $this->state(fn (array $attributes) => [
            'animal_type' => 'Sick/Injured',
        ]);
    }
}