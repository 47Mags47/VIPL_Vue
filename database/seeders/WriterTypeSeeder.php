<?php

namespace Database\Seeders;

use App\Models\WriterType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WriterTypeSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WriterType::create(['code' => 'bank-file', 'name' => 'Файл в банк']);
    }
}
