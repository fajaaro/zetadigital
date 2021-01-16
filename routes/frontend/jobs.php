<?php 

use App\Http\Controllers\Frontend\JobController;

Route::group(['prefix' => '/'], function() {
	Route::get('/', [JobController::class, 'index'])->name('home');

	Route::group(['prefix' => 'jobs'], function() {
		Route::get('/{id}', [JobController::class, 'show'])->name('frontend.jobs.show');
	});
});
