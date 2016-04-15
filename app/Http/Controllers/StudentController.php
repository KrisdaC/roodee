<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use App\Student;
use App\Subject;
use App\Quiz;

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
        return view('student.quiz', ['student' => $student, 'quiz' => $quiz]);
    }
}
