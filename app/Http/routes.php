<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



Route::group(['middleware' => ['web']], function() {
	/*
	Home page. Creates auth with custom guard (auth.php) and checks if logged in or not
	IF LOGGED IN
	THEN redirect to dashboard
	ELSE redirect to signin page
	*/
	Route::get('/', ['as' => '/', function () {
		
		/*$auth = auth()->guard('student');
		if($auth->check()){
			$student = $auth->user();
			return view('student.dashboard')->withStudent($student);
		}else{
			return view('signin');
		}*/

		return view('signin');
	}]);

	/*
	Route for signin page. Used for signing in users.
	*/

	Route::post('/signin', [
		'uses' => 'AuthenticationController@postSignIn',
		'as' => 'signin'
	]); 

	/*
	Route for signup page. Used for registering users.
	*/

	Route::post('/signup', [
		'uses' => 'AuthenticationController@postSignUp',
		'as' => 'signup'
	]);

	/*
	Getting the Student Dashboard
	*/

	Route::get('/student', [
		'uses' => 'StudentController@getStudentDashboard',
		'as' => 'student.dashboard',
		'middleware' => 'student'
	]);

	/*
	Route for Student Signing Out
	*/

	Route::get('/student_signout', [
		'uses' => 'StudentController@getSignOut',
		'as' => 'student.signout'
	]);

	/*
	Route for getting the subjects students study
	*/

	Route::get('/student_subject/{subject}', [
		'uses' => 'StudentController@getSubject',
		'as' => 'student.subject',
		'middleware' => 'student'
	]);

	Route::get('/quiz/{quiz}', [
		'uses' => 'StudentController@getQuiz',
		'as' => 'student.quiz',
		'middleware' => 'student'
	]);

	Route::post('/quiz/{quiz}', [
		'uses' => 'StudentController@postQuiz',
		'as' => 'student.quiz',
		'middleware' => 'student'
	]);

	/*Route::get('/teacher2', ['as' => 'teacher.dashboard', function (Request $request) {
		if(!session('msg')){
			echo "hello!";
		}		
	}]);*/


	/*
	Getting the Teacher Dashboard
	*/

	Route::get('/teacher', [
		'uses' => 'TeacherController@getTeacherDashboard',
		'as' => 'teacher.dashboard',
		'middleware' => 'teacher'
	]);

	/*
	Route for Teaching Signing Out
	*/
	Route::get('/teacher_signout', [
		'uses' => 'TeacherController@getSignOut',
		'as' => 'teacher.signout'
	]);

	/*
	Route for getting the subjects that teachers teach
	*/

	Route::get('/teacher_subject/{subject}', [
		'uses' => 'TeacherController@getSubject',
		'as' => 'teacher.subject',
		'middleware' => 'teacher'
	]);

	/*
	Route for Question
	*/

	Route::get('/createquiz/{subject}', [
		'uses' => 'TeacherController@getQuiz',
		'as' => 'teacher.createquiz',
		'middleware' => 'teacher'
	]);


	Route::post('/postquiz/{subject}', [
		'uses' => 'TeacherController@postQuiz',
		'as' => 'teacher.postquiz',
		'middleware' => 'teacher'
	]);
});
