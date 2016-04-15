@extends('layouts.master')
@extends('includes.header-teacher')
@section('title', 'Dashboard')
@section('name', $teacher->name)
@section('content')

<div class="row">
	<div class="col-md-12">
		<h1> Welcome {{$teacher->name}}</h1>
		<h3> Your Email: {{$teacher->email}}</h3>
	</div>
	@foreach($teacher->subjects() as $subject)
		<div class="col-md-3 col-xs-3">
			<a href={{route('teacher.subject', ['subject' => $subject, 'teacher' => $teacher])}}><img src="images/circle_logo.png" class="img-responsive"></a>
			<h5 class="text-center">{{$subject->name}}</h5>
			<br>
		</div>
	@endforeach
	</div>
</div>
@endsection