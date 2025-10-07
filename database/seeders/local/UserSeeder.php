<?php

namespace Database\Seeders\local;

use App\Models\Division;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Division::all()->each(function ($division) {
            User::factory()->create()
                ->addDivision($division)
                ->addRole('division administrator');

            User::factory()->create()
                ->addDivision($division)
                ->addRole('user');
        });
    }
}
