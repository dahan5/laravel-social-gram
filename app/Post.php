<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    //Foreign Key Reference to User Table using user_id
    public function user() {
        return $this->belongsTo(User::class);
    }
}
