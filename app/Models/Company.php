<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    public function recruiterDetails()
    {
    	return $this->hasMany('App\Models\RecruiterDetail');
    }

    public function subdistrict()
    {
    	return $this->belongsTo('App\Models\Subdistrict');
    }
}
