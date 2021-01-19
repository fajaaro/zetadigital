<?php 

use App\Http\Controllers\Frontend\ProfileController;

Route::group(['prefix' => 'profile', 'middleware' => ['auth']], function() {
	Route::get('/', [ProfileController::class, 'index'])->name('frontend.profile.index');
	Route::get('/setup', [ProfileController::class, 'formSetUpProfile'])->name('frontend.profile.setup');
	Route::post('/setup', [ProfileController::class, 'setUpProfile']);
	Route::get('/reset-password', [ProfileController::class, 'resetPassword'])->name('frontend.profile.resetPassword');
	Route::post('/reset-password', [ProfileController::class, 'processResetPassword']);
});