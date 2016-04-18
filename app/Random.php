<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Question;

class Random extends Model
{
	public $arr;
    public function generateMC(Question $question){
    	$arr = [1,2,3,4];
    	for($i = count($arr)-1; $i>0; $i--){
    		$index = rand(0, $i);
    		$temp = $arr[$index];
    		$arr[$index] = $arr[$i];
    		$arr[$i] = $temp;
    	}
    	//echo $question;
    	for($i = 0; $i<count($arr); $i++){
    		//echo $arr[$i];
    	}
    	//echo "<br>";
		for($i = 0; $i<count($arr); $i++){
    		switch($arr[$i]){
    			case 1:
                echo '<div class="radio">
                      <label>
                      <input type="radio" name="'.$question->id.'" id="option1" value= '.$question->answer.' >';
                echo $question->answer;
                echo '</label>
                      </div>';
    			//echo $question->answer;
    			break;
    			case 2:
    			echo '<div class="radio">
                      <label>
                      <input type="radio" name="'.$question->id.'" id="option2" value='.$question->option1.' >';
                echo $question->option1;
                echo '</label>
                      </div>';
                //echo $question->answer;
                break;
    			case 3:
    			echo '<div class="radio">
                      <label>
                      <input type="radio" name="'.$question->id.'" id="option3" value='.$question->option2.' >';
                echo $question->option2;
                echo '</label>
                      </div>';
                //echo $question->answer;
                break;
    			case 4:
    			echo '<div class="radio">
                      <label>
                      <input type="radio" name="'.$question->id.'" id="option4" value='.$question->option3.' >';
                echo $question->option3;
                echo '</label>
                      </div>';
                //echo $question->answer;
                break;
    		}
    	}//return [1,2,3,4];
    }
}
