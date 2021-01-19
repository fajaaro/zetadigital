<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResetPasswordRequest;
use App\Models\Company;
use App\Models\Recruiter;
use App\Models\Subdistrict;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
    	$user = Auth::user();

    	return view('frontend.profiles.index', compact('user'));
    }

    public function formSetUpProfile()
    {
        $subdistricts = Subdistrict::all();

    	return view('frontend.profiles.setup', compact('subdistricts'));
    }

    public function setUpProfile(Request $request)
    {
    	$user = Auth::user();

    	$user->first_name = $request->get('first_name');
    	$user->last_name = $request->get('last_name');
    	$user->phone_number = $request->get('phone_number');

    	if ($user->role_id == 3) {
    		$recruiter = new Recruiter();
    		$recruiter->user_id = $user->id;
    		$recruiter->company_id = $request->get('company_id');
    		$recruiter->position_at_company = $request->get('position_at_company');
    		$recruiter->save();
    	} 

		if ($request->hasFile('image_profile')) {
			$imageProfilePath = uploadFile($request->file('image_profile'), $user, 'users-photo-profile');

			$user->image_profile_path = $imageProfilePath;
		}

    	$user->save();

    	return redirect()->route('frontend.profile.index');
    }

    public function resetPassword()
    {
        return view('frontend.profiles.reset-password');
    }

    public function processResetPassword(ResetPasswordRequest $request)
    {
        $user = Auth::user();

        if (Hash::check($request->get('old_password'), $user->password)) {
            $user->password = Hash::make($request->get('new_password'));
            $user->save();

            return redirect()->route('frontend.profile.index')->with('success', 'Password changed!');
        }

        return back()->with('failed', 'Old password is wrong!');
    }
}
