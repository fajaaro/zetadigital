<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Province;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    public function show($code)
    {
    	$province = Province::where('code', $code)->first();

    	return response()->json([
    		$province
    	]);
    }
}
