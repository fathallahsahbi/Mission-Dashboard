<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    protected $primaryKey = 'challenge_id';

    public function users(){
        return $this->belongsToMany('App\User', 'challenge_users');
    }
}
