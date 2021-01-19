<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HiredUser extends Model
{
    use HasFactory;

    public function recruiter()
    {
    	return $this->belongsTo('App\Models\Recruiter');
    }

    public function user()
    {
    	return $this->belongsTo('App\Models\User');
    }
}
