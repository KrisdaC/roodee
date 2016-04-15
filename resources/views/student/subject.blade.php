@extends('layouts.master')
@extends('includes.header-student')
@section('title', 'Dashboard')
@section('name', $student->name)
@section('content')
<div class="row">
	<div class="col-md-12">
		<h1>{{$subject->name}}</h1>
		<div class="panel panel-default">
		  <div class="panel-heading"><h4>Quizzes</h4></div>
		  @foreach($subject->quizzes() as $quiz)
		  <div class="panel-body">
		    <a href={{route('student.quiz', ['quiz' => $quiz])}}>{{$quiz->title}}</a>
		    <hr class="quiz">
		  </div>
		  @endforeach
		</div>
	</div>
</div>
@endsection