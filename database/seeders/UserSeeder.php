<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserRole;
use App\Models\UserStatus;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(10)->create();

        User::factory()->create([
            'first_name'        => 'Администратор',
            'last_name'         => null,
            'middle_name'       => null,
            'login'             => 'admin',
            'email'             => 'admin@test.ru',
            'password'          => Hash::make('admin'),
            'password_expired'  => false,
            'user_status_id'    => UserStatus::byCode('active')->id,
            'user_role_id'      => UserRole::byCode('admin')->id,
            'deleted_at'        => null
        ]);
    }
}
