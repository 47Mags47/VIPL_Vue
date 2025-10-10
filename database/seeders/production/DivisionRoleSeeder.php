<?php

namespace Database\Seeders\production;

use App\Models\DivisionRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DivisionRoleSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DivisionRole::create(['code' => 'worker', 'name' => 'сотрудник']);
        DivisionRole::create(['code' => 'admin', 'name' => 'администратор']);
    }
}
