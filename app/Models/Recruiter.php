<?php

namespace App\Models;

use App\Models\HiredUser;
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

    public function hiredUsers()
    {
        return $this->hasMany('App\Models\HiredUser');
    }

    public function hasHired($userId)
    {
        return HiredUser::where([
            ['user_id', $userId],
            ['recruiter_id', $this->id],
        ])->exists();
    }
}
