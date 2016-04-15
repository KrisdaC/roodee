<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Student;
use App\Teacher;

class AuthenticationController extends Controller
{
    public function postSignIn(Request $request){
        /*
        Create custom auth and credentials. If successful, reroute back to home. If not, refresh page
        */
        if($request['position'] == 'student'){

            $auth = auth()->guard('student');
            $credentials = [
                'role_id' =>  $request['role_id'],
                'password' =>  $request['password'],
            ];
            if ($auth->attempt($credentials)) { 
                //$student = $auth->user(); 
                return redirect()->route('student.dashboard');
                //return view('student.dashboard')->withStudent($student);
            } else {
                return redirect()->back();
            }

        }else{
            
            $auth = auth()->guard('teacher');
            $credentials = [
                'role_id' =>  $request['role_id'],
                'password' =>  $request['password'],
            ];
            if ($auth->attempt($credentials)) {  
                $teacher = $auth->user();
                return redirect()->route('teacher.dashboard');
                //return view('teacher.dashboard')->withTeacher($teacher);
            } else {
                return redirect()->back();
            }

        }    
    }

    public function postSignUp(Request $request){
            $email = $request['email'];
            $id = $request['role_id'];
            $password = bcrypt($request['password']);
            $name = $request['name'];

        if($request['position'] == 'student'){
            $student = new Student();
            $student->email = $email;
            $student->role_id = $id;
            $student->password = $password;
            $student->name = $name;

            $student->save();  
        }else{
            $teacher = new Teacher();
            $teacher->email = $email;
            $teacher->role_id = $id;
            $teacher->password = $password;
            $teacher->name = $name;

            $teacher->save();  
        }
        
    }

}
