<?php 

use App\Http\Controllers\Frontend\PeopleController;

Route::group(['prefix' => 'people', 'middleware' => ['admin']], function() {
	Route::get('/', [PeopleController::class, 'index'])->name('frontend.people.index');
});