<?php

namespace Database\Seeders;

use App\Models\Payment;
use App\Models\PaymentEvent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentEventSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (range(0, 30) as $day) {
            PaymentEvent::factory(rand(0,5))->create(['date' => now()->startOfMonth()->addDays($day)]);
        }

        PaymentEvent::factory(100)->create();
    }
}
