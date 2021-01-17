<?php 

use App\Http\Controllers\Backend\CompanyController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'companies'], function() {
	Route::get('/', [CompanyController::class, 'index'])->name('backend.companies.index');
	Route::post('/{id}/confirm', [CompanyController::class, 'confirmCompany'])->name('backend.companies.confirmCompany');	
	Route::post('/{id}/unconfirm', [CompanyController::class, 'unconfirmCompany'])->name('backend.companies.unconfirmCompany');	
});