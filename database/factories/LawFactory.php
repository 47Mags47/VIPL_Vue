<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Law>
 */
class LawFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => rand(1,100) . (rand(1,2) === 1 ? '-ФЗ' : '-РЗ'),
            'name' => $this->faker->paragraph(),
        ];
    }
}
