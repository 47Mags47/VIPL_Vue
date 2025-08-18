<?php

namespace Database\Seeders;

use App\Models\UserStatus;
use Illuminate\Database\Seeder;

class UserStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserStatus::create(['code' => 'active',     'name' => 'Активен']);
        UserStatus::create(['code' => 'disabled',   'name' => 'Отключен']);
    }
}
