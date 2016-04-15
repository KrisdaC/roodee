<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use App\Student;
use App\Subject;
use App\Quiz;
use App\Question;

class TeacherController extends Controller
{
    

    public function getTeacherDashboard(){
        $auth = auth()->guard('teacher');
        $teacher = $auth->user();
        return view('teacher.dashboard')->withTeacher($teacher);
    }

    public function getSignOut(){

        //Modify to add student/teacher
        
        $auth = auth()->guard('teacher');
        $auth->logout();
        return redirect()->route('/');
    }

     public function getSubject($subject){
        $auth = auth()->guard('teacher');
        $teacher = $auth->user(); 
        $subject = Subject::find($subject);
        return view('teacher.subject', ['teacher' => $teacher, 'subject' => $subject]);
    }

    public function getQuiz($subject){
        $auth = auth()->guard('teacher');
        $teacher = $auth->user(); 
        $subject = Subject::find($subject);
        return view('teacher.createquiz', ['teacher' => $teacher, 'subject' => $subject]);
    }

    public function postQuiz(Request $request, $subject){
        $quiz = new Quiz();
        $quiz->subject_id = $subject;
        $quiz->title = $request['title'];
        $quiz->save();
        $arr = json_decode($request['questions'], true);
        foreach($arr as $question){
            switch($question['type']){
                case 'MC':
                    $mc = new Question();
                    $mc->quiz_id = $quiz->id;
                    $mc->question = $question['question'];
                    $mc->answer = $question['answer'];
                    $mc->option1 = $question['option1'];
                    $mc->option2 = $question['option2'];
                    $mc->option3 = $question['option3'];
                    $mc->type = $question['type'];
                    $mc->save();
                    break;
                case 'FITB':
                    $fitb = new Question();
                    $fitb->quiz_id = $quiz->id;
                    $fitb->question = $question['title'];
                    $fitb->answer = $question['answer'];
                    $fitb->type = $question['type'];
                    $fitb->save();
                    break;
                default:
                    //do nothing
            }
        }
        return redirect()->route('teacher.dashboard');
    }
}