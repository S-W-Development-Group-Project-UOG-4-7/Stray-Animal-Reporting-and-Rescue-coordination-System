<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DonationFactory extends Factory
{
    public function definition(): array
    {
        $paymentMethods = ['bank_transfer', 'card', 'cash'];
        $statuses = ['pending', 'completed', 'verified', 'failed'];
        $method = $this->faker->randomElement($paymentMethods);
        
        return [
            'transaction_id' => strtoupper($method) . date('Ymd') . $this->faker->unique()->numerify('######'),
            'amount' => $this->faker->randomFloat(2, 10, 1000),
            'payment_method' => $method,
            'status' => $this->faker->randomElement($statuses),
            'email' => $this->faker->safeEmail(),
            'name' => $this->faker->name(),
            'message' => $this->faker->optional()->sentence(),
            'card_last4' => $method === 'card' ? $this->faker->numerify('####') : null,
            'ip_address' => $this->faker->ipv4(),
            'user_agent' => $this->faker->userAgent(),
        ];
    }
}