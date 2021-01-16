<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\RecruiterDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
    	$user = Auth::user();

    	dd($user);

    	return view('frontend.profiles.index', compact('profile'));
    }

    public function formSetUpProfile()
    {
    	return view('frontend.profiles.setup');
    }

    public function setUpProfile(Request $request)
    {
    	$user = Auth::user();

    	$user->first_name = $request->get('first_name');
    	$user->last_name = $request->get('last_name');
    	$user->phone_number = $request->get('phone_number');

    	if ($user->role_id == 3) {
    		if ($request->has('existing_company')) {
	    		$recruiterDetail = new RecruiterDetail();
	    		$recruiterDetail->user_id = $user->id;
	    		$recruiterDetail->company_id = $request->get('company_id');
	    		$recruiterDetail->position_at_company = $request->get('position_at_company');
	    		$recruiterDetail->save();
    		} else {
    			$company = new Company();
    			$company->subdistrict_id = $request->get('subdistrict_id');
    			$company->name = $request->get('name');
    			$company->address = $request->get('address');
    			$company->save();
    			
    			if ($request->hasFile('image_profile')) {
    				$imageProfilePath = uploadImage($request->file('image_profile'), $company, 'companies-photo-profile');

    				$company->image_profile_path = $imageProfilePath;
    				$company->save();
    			}
    		}
    	} else {
    		if ($request->hasFile('image_profile')) {
				$imageProfilePath = uploadImage($request->file('image_profile'), $user, 'users-photo-profile');

				$user->image_profile_path = $imageProfilePath;
			}
    	}

    	$user->save();

    	return redirect()->route('frontend.profiles.index');
    }
}
