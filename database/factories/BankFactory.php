<?php

namespace Database\Factories;

use App\Models\BankContract;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bank>
 */
class BankFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => $this->faker->numerify('###'),
            'name' => $this->faker->word(),
            'contract_id' => BankContract::all()->random()->id,
        ];
    }
}
