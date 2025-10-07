<?php

namespace Database\Seeders\local;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocalSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call(BankContractSeeder::class);
        $this->call(BankSeeder::class);

        $this->call(DivisionSeeder::class);

        $this->call(LawSeeder::class);

        $this->call(PaymentSeeder::class);
        $this->call(PaymentEventSeeder::class);

        $this->call(UserSeeder::class);
    }
}
