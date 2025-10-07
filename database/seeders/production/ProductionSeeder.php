<?php

namespace Database\Seeders\production;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductionSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call(UserStatusSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(RoleToPermissionSeeder::class);

        $this->call(WriterTypeSeeder::class);
        $this->call(WriterSeeder::class);

        $this->call(DivisionSeeder::class);

        $this->call(PaymentEventStatusSeeder::class);

        $this->call(UserSeeder::class);
    }
}
