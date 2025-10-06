<?php

namespace Database\Factories;

use App\Models\Division;
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
        $gender = rand(1,2) === 1 ? 'male' : 'female';

        return [
            'full_name'         => $this->faker->lastName($gender) . ' ' . $this->faker->firstName($gender) . ' ' . $this->faker->firstName('male') . ($gender === 'male' ? 'ов' : 'ова'),
            'login'             => $this->faker->unique()->word(),
            'email'             => $this->faker->email(),
            'password'          => Hash::make($this->faker->word),
            'status_id'         => UserStatus::getRandomId(),
            'password_expired'  => (bool) rand(0, 1),
            'email_verified_at' => now()->subDay(rand(1, 364)),
            'deleted_at'        => rand(0, 10) === 10 ? now() : null
        ];
    }
}
