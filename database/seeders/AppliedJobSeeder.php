<?php

namespace Database\Seeders;

use App\Models\AppliedJob;
use App\Models\User;
use Illuminate\Database\Seeder;

class AppliedJobSeeder extends Seeder
{
    public function run()
    {
		$user = User::where('role_id', 4)->first();

        $appliedJob = new AppliedJob();
        $appliedJob->job_id = 1;
        $appliedJob->user_id = $user->id;
        $appliedJob->cv_path = 'applied-jobs-cv/' . strToSlug($user->getFullName()) . '.pdf';
        $appliedJob->save();
    }
}
