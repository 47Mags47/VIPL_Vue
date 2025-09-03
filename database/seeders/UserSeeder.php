<?php

namespace Database\Seeders;

use App\Models\Division;
use App\Models\User;
use App\Models\UserRole;
use App\Models\UserStatus;
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
        Division::all()->each(function($division){
            User::factory(3)->create(['division_id' => $division]);
        });

        User::factory()->create([
            'first_name'        => null,
            'last_name'         => 'Администратор',
            'middle_name'       => null,
            'login'             => 'admin',
            'email'             => 'admin@test.ru',
            'password'          => Hash::make('admin'),
            'password_expired'  => false,
            'division_id'       => null,
            'status_id'         => UserStatus::byCode('active')->id,
            'role_id'           => UserRole::byCode('admin')->id,
            'deleted_at'        => null
        ]);
    }
}
