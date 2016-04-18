<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
	public function randomizer(){
		$arr = [1,2,3,4];
    	for($i = count($arr)-1; $i>0; $i--){
    		$index = rand(0, $i);
    		$temp = $arr[$index];
    		$arr[$index] = $arr[$i];
    		$arr[$i] = $temp;
    	}
    	//echo $question;
    	
	}
    public function option1($string){
    	echo $string[0];
    }
}
