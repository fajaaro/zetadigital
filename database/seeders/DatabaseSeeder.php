<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(RoleSeeder::class);
        $this->call(ProvinceSeeder::class);
        $this->call(SubdistrictSeeder::class);
        $this->call(UserSeeder::class);
    }
}
