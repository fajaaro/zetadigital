<?php 

use App\Http\Controllers\Frontend\ApplicantController;

Route::group(['prefix' => 'applicants'], function() {
	Route::get('/', [ApplicantController::class, 'index'])->name('frontend.applicants.index');
});
