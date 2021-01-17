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

function uploadFile($file, $model, $folder)
{
	$fileExtension = $file->guessExtension();
    $fileName = $model->id . '-' . strToSlug($model->name ? $model->name : $model->getFullName()) . '.' . $fileExtension; 
    $filePath = Storage::putFileAs($folder, $file, $fileName);

    return $filePath;
}
