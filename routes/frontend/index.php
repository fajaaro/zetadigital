<?php 

Route::group(['prefix' => '/'], function () {
	$dir = base_path('routes/frontend');
	
	$files = scandir($dir);
	
	foreach ($files as $file) {
		if (!in_array($file, array('.', '..', 'index.php'))) {
			require $dir . '/' . $file;
		}
	};
});
