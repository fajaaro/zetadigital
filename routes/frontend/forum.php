<?php 

use App\Http\Controllers\Frontend\ForumController;

Route::group(['prefix' => 'forum'], function() {
	Route::get('/', [ForumController::class, 'index'])->name('frontend.forum.index');
	Route::post('/', [ForumController::class, 'store'])->name('frontend.forum.store');
	Route::post('/reply', [ForumController::class, 'reply'])->name('frontend.forum.reply');
});
