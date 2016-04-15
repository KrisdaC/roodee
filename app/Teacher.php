<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

class Teacher extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;
    public function subjects(){
    	return $this->belongsToMany('App\Subject')->get();
    }
}
