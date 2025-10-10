<?php

namespace Database\Seeders\production;

use App\Models\Division;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'first_name'        => null,
            'last_name'         => 'root',
            'middle_name'       => null,
            'login'             => 'root',
            'email'             => null,
            'password'          => Hash::make('root'),
            'password_expired'  => false,
            'deleted_at'        => null
        ])
            ->setStatus('active')
            ->addRole('root')
            ->addDivision(Division::where('name', 'root')->get()->first(), 'admin');

        User::factory()->create([
            'first_name'        => null,
            'last_name'         => 'Администратор',
            'middle_name'       => null,
            'login'             => 'admin',
            'email'             => 'admin@test.ru',
            'password'          => Hash::make('admin'),
            'password_expired'  => false,
            'deleted_at'        => null
        ])
            ->setStatus('active')
            ->addRole('program administrator')
            ->addDivision(Division::where('name', 'root')->get()->first(), 'admin');
    }
}
