<?php

use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\ProvinceController;
use App\Http\Controllers\Api\SubdistrictController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/subdistricts/{id}', [SubdistrictController::class, 'show'])->name('api.subdistricts.show');
Route::get('/provinces/{code}', [ProvinceController::class, 'show'])->name('api.provinces.show');

Route::group(['prefix' => 'companies', 'middleware' => 'auth:api'], function() {
	Route::get('/', [CompanyController::class, 'index'])->name('api.companies.index');
	Route::post('/', [CompanyController::class, 'store'])->name('api.companies.store');	
});
