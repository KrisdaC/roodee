<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use App\Student;
use App\Subject;
use App\Quiz;
use App\Random;

class StudentController extends Controller
{

    public function getStudentDashboard(){
        $auth = auth()->guard('student');
        $student = $auth->user();
        return view('student.dashboard')->withStudent($student);
    }

    public function getSignOut(){

        //Modify to add student/teacher
        
        $auth = auth()->guard('student');
        $auth->logout();
        return redirect()->route('/');
    }

    public function getSubject($subject){
        $auth = auth()->guard('student');
        $student = $auth->user(); 
        $subject = Subject::find($subject);
        return view('student.subject', ['student' => $student, 'subject' => $subject]);
    }

    public function getQuiz($quiz){
        $auth = auth()->guard('student');
        $student = $auth->user();
        $quiz = Quiz::find($quiz);
        $rand = new Random();
        return view('student.quiz', ['student' => $student, 'quiz' => $quiz, 'rand' => $rand]);
    }

    public function postQuiz(Request $request){
        $auth = auth()->guard('student');
        $student = $auth->user();
        $quiz = Quiz::find($request['quiz_id']);
        $result = array();
        $score = 0;
        //$formData = $request->all();
        //echo var_dump($formData);
        $quiz = Quiz::find($request['quiz_id']);
        foreach($quiz->questions() as $question){
            array_push($result, $request[$question->id]);
            array_push($result, $question->answer);
            if(strtolower($request[$question->id]) == strtolower($question->answer)){
                array_push($result, 'CORRECT!');
                $score++;
                //echo $question->question . $request[$question->id] . "correct!";
            }else{
                array_push($result, 'WRONG!');
                //echo $question->question . $request[$question->id] . "wrong!";
            }
            //echo "<br>";
        }
        //echo var_dump($result);
        array_push($result, $score);
        return view('student.quiz_result', ['student' => $student, 'quiz' => $quiz, 'result' => $result]);
        //echo $quiz->questions();
        //echo $request['hello'];
        //echo $request['1'];
    }
}
