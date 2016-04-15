@extends('layouts.master')
@extends('includes.header-teacher')
@section('title', 'Dashboard')
@section('name', $teacher->name)
@section('content')


<div class="row">
	<div class="col-md-10">
		<h1>{{$subject->name}}</h1>
		<div class="panel panel-default">
		  <div class="panel-heading"><h4>Quizzes</h4></div>
		  @foreach($subject->quizzes() as $quiz)
		  <div class="panel-body">
		    {{$quiz->title}}
		    <hr class="quiz">
		  </div>
		  @endforeach
		</div>
	</div>
	<div class="col-md-2 text-center">
		<a class="btn btn-primary btn-block" href="#">New Assignment</a>
		<a class="btn btn-primary btn-block" href={{route('teacher.createquiz', ['subject' => $subject])}}>Create Quiz</a>
	</div>
</div>
@endsection