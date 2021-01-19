<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AppliedJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AppliedJobController extends Controller
{
    public function index()
    {
        $appliedJobs = AppliedJob::with(['job.recruiter.company', 'user'])->get();

        return view('backend.applied-jobs.index', compact('appliedJobs'));
    }

    public function destroy($id)
    {
        $appliedJob = AppliedJob::find($id);

		if ($appliedJob) {
			Storage::delete($appliedJob->cv_path);

			$appliedJob->delete();

            return redirect()->route('backend.appliedJobs.index')->with('success', 'Delete success!');            
		} 

        return redirect()->route('backend.appliedJobs.index')->with('failed', 'Delete failed!');
    }
}
