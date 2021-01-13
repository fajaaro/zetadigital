<?php

namespace Database\Seeders;

use App\Models\RecruiterDetail;
use App\Models\User;
use Illuminate\Database\Seeder;

class RecruiterSeeder extends Seeder
{
    public function run()
    {
        $recruiter = User::where('role_id', 3)->first();

        $recruiterDetail = new RecruiterDetail();
        $recruiterDetail->user_id = $recruiter->id;
        $recruiterDetail->company_id = 1;
        $recruiterDetail->position_at_company = 'Human Resources Development';
        $recruiterDetail->save();
    }
}
