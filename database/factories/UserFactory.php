<?php

namespace Database\Factories;

use App\Models\UserRole;
use App\Models\UserStatus;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name'        => $this->faker->firstName(),
            'last_name'         => $this->faker->lastName(),
            'middle_name'       => $this->faker->lastName(),
            'login'             => $this->faker->unique()->word(),
            'email'             => $this->faker->email(),
            'password'          => Hash::make($this->faker->word),
            'password_expired'  => (bool) rand(0, 1),
            'user_status_id'    => UserStatus::all()->random()->id,
            'user_role_id'      => UserRole::all()->random()->id,
            'email_verified_at' => now()->subDay(rand(1, 364)),
            'deleted_at'        => rand(0, 10) === 10 ? now() : null
        ];
    }
}
