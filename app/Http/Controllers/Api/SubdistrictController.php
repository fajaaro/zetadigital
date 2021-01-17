<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Subdistrict;
use Illuminate\Http\Request;

class SubdistrictController extends Controller
{
    public function show($id)
    {
    	$subdistrict = Subdistrict::find($id);
    	
    	return response()->json([
    		$subdistrict
    	]);
    }
}
