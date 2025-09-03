<?php

namespace Database\Seeders;

use App\Models\BankContract;
use App\Models\Writer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BankContractSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Writer::all()->each(function ($writer) {
            BankContract::factory()->create(['writer_id' => $writer->id]);
        });
    }
}
