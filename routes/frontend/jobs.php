<?php 

use App\Http\Controllers\Frontend\JobController;

Route::group(['prefix' => '/'], function() {
	Route::get('/', [JobController::class, 'index'])->name('home');

	Route::group(['prefix' => 'jobs'], function() {
		Route::get('/{id}/show', [JobController::class, 'show'])->name('frontend.jobs.show');
		Route::post('/{id}/apply', [JobController::class, 'apply'])->name('frontend.jobs.apply')->middleware('auth');
		Route::get('/create', [JobController::class, 'create'])->name('frontend.jobs.create')->middleware('recruiter');
		Route::post('/', [JobController::class, 'store'])->name('frontend.jobs.store')->middleware('recruiter');
	});
});
