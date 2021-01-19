<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\HiredUser;
use App\Models\User;
use Illuminate\Http\Request;

class PeopleController extends Controller
{
    public function index()
    {
    	$members = User::with('appliedJobs')->where('role_id', 4)->get();

    	return view('frontend.people.index', compact('members'));
    }

    public function hire(Request $request)
    {
    	$hiredUser = new HiredUser();
    	$hiredUser->recruiter_id = $request->get('recruiter_id');
    	$hiredUser->user_id = $request->get('user_id');
    	$hiredUser->save();

    	return back()->with('success', 'Success hired user with name ' . $hiredUser->user->getFullName() . '!');
    }
}
