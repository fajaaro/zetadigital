<?php

namespace Database\Seeders;

use App\Models\Recruiter;
use App\Models\User;
use Illuminate\Database\Seeder;

class RecruiterSeeder extends Seeder
{
    public function run()
    {
        $user = User::where('role_id', 3)->first();

        $recruiter = new Recruiter();
        $recruiter->user_id = $user->id;
        $recruiter->company_id = 1;
        $recruiter->position_at_company = 'Human Resources Development';
        $recruiter->save();
    }
}
