<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class PeopleController extends Controller
{
    public function index()
    {
    	$members = User::with('appliedJobs')->where('role_id', 4)->get();

    	return view('frontend.people.index', compact('members'));
    }
}
