<?php

namespace Database\Seeders\production;

use App\Models\PaymentEventStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentEventStatusSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PaymentEventStatus::create(['code' => 'disabled',   'name' => 'Отключена']);
        PaymentEventStatus::create(['code' => 'active',     'name' => 'Активна']);
        PaymentEventStatus::create(['code' => 'ршввут',     'name' => 'Скрыта']);
    }
}
