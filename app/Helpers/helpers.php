<?php 

use Illuminate\Support\Facades\Storage;

function formatDate($timestamp, $format = 'D, d M Y') {
	$date = date_create($timestamp);
	$dateFormatted = date_format($date, $format);

	return $dateFormatted;
}

function strToSlug($str) {
	return str_replace(' ', '-', strtolower($str));
}

function uploadImage($image, $model, $folder)
{
	$imageExtension = $image->guessExtension();
    $imageName = $model->id . '-' . strToSlug($model->name) . '.' . $imageExtension; 
    $imagePath = Storage::putFileAs($folder, $image, $imageName);

    return $imagePath;
}
