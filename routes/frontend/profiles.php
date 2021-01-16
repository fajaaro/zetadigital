<?php 

use App\Http\Controllers\Frontend\ProfileController;

Route::group(['prefix' => 'profile', 'middleware' => ['auth']], function() {
	Route::get('/', [ProfileController::class, 'index'])->name('frontend.profile.index');
	Route::get('/setup', [ProfileController::class, 'formSetUpProfile'])->name('frontend.profile.setup');
	Route::post('/setup', [ProfileController::class, 'setUpProfile']);
});