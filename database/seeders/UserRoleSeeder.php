<?php

namespace Database\Seeders;

use App\Models\UserRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserRole::create(['code' => 'root',                     'name' => 'Администратор системы']);
        UserRole::create(['code' => 'program administrator',    'name' => 'Администратор приложения']);
        UserRole::create(['code' => 'program moderator',        'name' => 'Модератор приложения']);
        UserRole::create(['code' => 'division administrator',   'name' => 'Администратор подразделения']);
        UserRole::create(['code' => 'user',                     'name' => 'Пользователь']);
    }
}
