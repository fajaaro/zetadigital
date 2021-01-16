<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;

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
}
