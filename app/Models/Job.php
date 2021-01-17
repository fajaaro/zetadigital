<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    public function company()
    {
    	return $this->belongsTo('App\Models\Company');
    }

    public function recruiter()
    {
    	return $this->belongsTo('App\Models\Recruiter');
    }

    public function appliedJobs()
    {
    	return $this->hasMany('App\Models\AppliedJob');
    }
}
