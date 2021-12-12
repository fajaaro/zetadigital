<?php 

use App\Http\Controllers\Frontend\ForumController;

Route::group(['prefix' => 'forum'], function() {
	Route::get('/', [ForumController::class, 'index'])->name('frontend.forum.index');
});
