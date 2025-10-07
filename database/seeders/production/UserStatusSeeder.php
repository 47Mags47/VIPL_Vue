<?php

namespace Database\Seeders\production;

use App\Models\UserStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserStatusSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserStatus::create(['code' => 'active',     'name' => 'Активен']);
        UserStatus::create(['code' => 'disabled',   'name' => 'Отключен']);
    }
}
