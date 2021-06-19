<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(ProvinceSeeder::class);
        $this->call(SubdistrictSeeder::class);
        $this->call(CompanySeeder::class);
        $this->call(UserSeeder::class);
        $this->call(RecruiterSeeder::class);
        $this->call(JobSeeder::class);
        $this->call(AppliedJobSeeder::class);
    }
}
