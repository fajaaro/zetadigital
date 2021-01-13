<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppliedJob extends Model
{
    use HasFactory;

    public function job()
    {
    	return $this->belongsTo('App\Models\Job');
    }

    public function user()
    {
    	// return data pelamar
    	return $this->belongsTo('App\Models\User');
    }    
}
