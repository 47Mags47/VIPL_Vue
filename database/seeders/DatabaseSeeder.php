<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(production\ProductionSeeder::class);

        if (config('app.env') !== 'production')
            $this->call(local\LocalSeeder::class);

        if (config('app.env') !== 'test')
            $this->call(test\TestSeeder::class);
    }
}
