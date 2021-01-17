<?php 

use App\Http\Controllers\Backend\UserController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'users'], function() {
	Route::get('/', [UserController::class, 'index'])->name('backend.users.index');
	Route::delete('/{id}', [UserController::class, 'destroy'])->name('backend.users.destroy');
});