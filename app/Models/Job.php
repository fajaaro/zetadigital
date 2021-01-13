<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    public function user()
    {
    	return $this->belongsTo('App\Models\User', 'recruiter_id');
    }

    public function appliedJobs()
    {
    	return $this->hasMany('App\Models\AppliedJob');
    }
}
