<?php

namespace Database\Seeders;

use App\Models\Division;
use App\Models\User;
use App\Models\UserRole;
use App\Models\UserStatus;
use App\Models\UserToUserRole;
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
        $root = User::factory()->create([
            'full_name'         => 'root',
            'login'             => 'root',
            'email'             => null,
            'password'          => Hash::make('root'),
            'status_id'         => UserStatus::byCode('active')->id,
            'password_expired'  => false,
            'deleted_at'        => null
        ]);

        $admin = User::factory()->create([
            'full_name'         => 'Администратор',
            'login'             => 'admin',
            'email'             => 'admin@test.ru',
            'password'          => Hash::make('admin'),
            'status_id'         => UserStatus::byCode('active')->id,
            'password_expired'  => false,
            'deleted_at'        => null
        ]);

        UserToUserRole::create(['user_id' => $admin->id, 'role_id' => UserRole::byCode('program administrator')->id]);
    }
}
