<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AppliedJob;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public function index()
    {
    	$jobs = Job::with(['company'])->get();
    	$featuredJobs = Job::with('appliedJobs')->get()->sortByDesc(function($featuredJob) {
    		return $featuredJob->appliedJobs->count();
    	});

    	return view('frontend.jobs.index', compact('jobs', 'featuredJobs'));
    }

    public function show($id)
    {
    	$job = Job::with(['recruiter', 'company.subdistrict.province'])->where('id', $id)->first();

    	return view('frontend.jobs.show', compact('job'));
    }

    public function apply(Request $request, $id)
    {
        $user = Auth::user();

        $cvPath = uploadFile($request->file('cv'), $user, 'applied-jobs-cv');

        $appliedJob = new AppliedJob();
        $appliedJob->job_id = $id;
        $appliedJob->user_id = $user->id;
        $appliedJob->cv_path = $cvPath;
        $appliedJob->save();

        return back();
    }
}
