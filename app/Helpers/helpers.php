<?php 

function strToSlug($str) {
	return str_replace(' ', '-', strtolower($str));
}
