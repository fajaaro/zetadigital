<?php 

use App\Http\Controllers\Backend\HiredUserController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'hired-users'], function() {
	Route::get('/', [HiredUserController::class, 'index'])->name('backend.hiredUsers.index');
	Route::delete('/{id}', [HiredUserController::class, 'destroy'])->name('backend.hiredUsers.destroy');
});