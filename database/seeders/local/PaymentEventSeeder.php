<?php

namespace Database\Seeders\local;

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
        foreach (range(-30, 60) as $day) {
            PaymentEvent::factory(rand(0,5))->create(['date' => now()->startOfMonth()->addDays($day)]);
        }
    }
}
