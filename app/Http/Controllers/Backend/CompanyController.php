<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::with(['jobs', 'registrant', 'recruiters'])->get();

        return view('backend.companies.index', compact('companies'));
    }

    public function confirmCompany($id)
    {
    	$company = Company::findOrFail($id);
    	$company->confirmed = 1;
    	$company->save();

    	return redirect()->route('backend.companies.index')->with('success', $company->name . ' has been confirmed!');
    }

    public function unconfirmCompany($id)
    {
    	$company = Company::findOrFail($id);
    	$company->confirmed = 0;
    	$company->save();

    	return redirect()->route('backend.companies.index')->with('success', $company->name . ' has been unconfirmed!');
    }

}
