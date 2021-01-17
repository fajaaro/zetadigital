<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recruiter extends Model
{
    use HasFactory;

    public function user()
    {
    	return $this->belongsTo('App\Models\User');
    }

    public function company()
    {
    	return $this->belongsTo('App\Models\Company');
    }

    public function jobs()
    {
        return $this->hasMany('App\Models\Job');
    }
}
