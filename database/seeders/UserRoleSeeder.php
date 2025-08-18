<?php

namespace Database\Seeders;

use App\Models\UserRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserRole::create(['code' => 'admin',            'name' => 'Администратор']);
        UserRole::create(['code' => 'moder',            'name' => 'Модератор']);
        UserRole::create(['code' => 'division',         'name' => 'Администратор подразделения']);
        UserRole::create(['code' => 'user',             'name' => 'Пользователь']);
    }
}
