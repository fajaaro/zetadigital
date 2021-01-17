<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    public function registrant()
    {
    	return $this->belongsTo('App\Models\User', 'registrant_id');
    }

    public function recruiters()
    {
    	return $this->hasMany('App\Models\Recruiter');
    }

    public function subdistrict()
    {
    	return $this->belongsTo('App\Models\Subdistrict');
    }

    public function jobs()
    {
        return $this->hasMany('App\Models\Job');
    }
}
