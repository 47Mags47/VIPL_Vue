<?php

namespace Database\Seeders;

use App\Models\Bank;
use App\Models\BankContract;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BankSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BankContract::all()->each(function ($contract) {
            Bank::factory()->create(['contract_id' => $contract]);
        });
    }
}
