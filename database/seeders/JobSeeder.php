<?php

namespace Database\Seeders;

use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    public function run()
    {
		$recruiter = User::where('role_id', 3)->first();

        $job = new Job();
        $job->recruiter_id = $recruiter->id;
        $job->name = 'Software Engineer';
        $job->type = 'onsite';
        $job->slots = 1;
        $job->description = "We need a motivated and skilful PHP Laravel developer to join our team. Able to work in a team. At least 1 year experience in Laravel, WordPress, CSS, HTML, UI-UX, & REST API. Fresh graduates are encouraged to apply. Knowledge of Laravel or WordPress is a must. Experience with building Restful JSON web services. Knowledge of API's.";
        $job->status = 'open';
        $job->save();
    }
}
