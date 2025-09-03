<?php

namespace Database\Factories;

use App\Models\Payment;
use App\Models\PaymentEventStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PaymentEvent>
 */
class PaymentEventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date' => now()->addYear()->subDay(rand(1, 364)),
            'payment_id' => Payment::all()->random()->id,
            'status_id' => PaymentEventStatus::all()->random()->id,
        ];
    }
}
