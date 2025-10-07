<?php

namespace Database\Seeders\production;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['code' => 'root',                     'name' => 'Администратор системы']);
        Role::create(['code' => 'program administrator',    'name' => 'Администратор приложения']);
        Role::create(['code' => 'program moderator',        'name' => 'Модератор приложения']);
        Role::create(['code' => 'division administrator',   'name' => 'Администратор подразделения']);
        Role::create(['code' => 'user',                     'name' => 'Пользователь']);
    }
}
