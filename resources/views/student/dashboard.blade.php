@extends('layouts.master')
@extends('includes.header-student')
@section('title', 'Dashboard')
@section('name', $student->name)
@section('content')
<div class="row">
	<div class="col-md-12">
		<h1> Welcome {{$student->name}}</h1>
		<h3> Your Email: {{$student->email}}</h3>
	</div>
	@foreach($student->subjects() as $subject)
		<div class="col-md-3 col-xs-3">
			<a href={{route('student.subject', ['subject' => $subject, 'student' => $student])}}><img src="images/circle_logo.png" class="img-responsive"></a>
			<h5 class="text-center">{{$subject->name}}</h5>
			<br>
		</div>
	@endforeach
	</div>
</div>
@endsection