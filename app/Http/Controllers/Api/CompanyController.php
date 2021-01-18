<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CompanyResource;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
    	$companies = CompanyResource::collection(
            Company::all()
        );

        return response()->json([
            'status' => 'success',
            'companies' => $companies,
            'message' => 'success get all companies!',
        ]);
    }

    public function store(Request $request)
    {
    	$company = new Company();
        $company->registrant_id = $request->get('user_id');
		$company->subdistrict_id = $request->get('subdistrict_id');
		$company->name = $request->get('name');
		$company->address = $request->get('address');
		$company->save();
		
		if ($request->hasFile('image_profile')) {
			$imageProfilePath = uploadFile($request->file('image_profile'), $company, 'companies-photo-profile');

			$company->image_profile_path = $imageProfilePath;
			$company->save();
		}

		return response()->json([
			'status' => 'success',
			'data' => $company,
			'message' => 'success add new company!',
		]);
    }
}
