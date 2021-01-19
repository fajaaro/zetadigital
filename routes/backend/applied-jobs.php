<?php 

use App\Http\Controllers\Backend\AppliedJobController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'applied-jobs'], function() {
	Route::get('/', [AppliedJobController::class, 'index'])->name('backend.appliedJobs.index');
	Route::delete('/{id}', [AppliedJobController::class, 'destroy'])->name('backend.appliedJobs.destroy');
});