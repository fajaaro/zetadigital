<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    use HasFactory;

    public function author()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function replies()
    {
        return $this->hasMany('App\Models\ForumReply', 'forum_id');
    }
}
