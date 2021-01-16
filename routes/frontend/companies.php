<?php 

use App\Http\Controllers\Frontend\CompanyController;

Route::group(['prefix' => 'companies'], function() {
	Route::get('/', [CompanyController::class, 'index'])->name('frontend.companies.index');
});