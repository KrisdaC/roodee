<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    public function teachers(){
    	return $this->belongsToMany('App\Teacher')->get();
    }

    public function quizzes(){
    	return $this->hasMany('App\Quiz')->get();
    }
}
