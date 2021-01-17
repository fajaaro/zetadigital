<?php

namespace App\Models;

use App\Models\AppliedJob;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'role_id',
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }

    public function recruiterDetail()
    {
        return $this->hasOne('App\Models\RecruiterDetail');
    }

    public function jobs()
    {
        // return pekerjaan yang diposting user dengan tipe recruiter
        return $this->hasMany('App\Models\Job', 'recruiter_id');
    }

    public function appliedJobs()
    {
        return $this->hasMany('App\Models\AppliedJob');
    }

    public function companies()
    {
        // return companies yang didaftarkan oleh user
        return $this->hasMany('App\Models\Company', 'registrant_id');
    }

    public function getFullName()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function inRole($role)
    {
        return $this->role->name == strtolower($role);
    }

    public function hasApplyJob($id)
    {
        return AppliedJob::where([
            ['job_id', $id],
            ['user_id', $this->id],
        ])->exists();
    }
}
