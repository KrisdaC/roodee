@extends('layouts.master')
@extends('includes.header-student')
@section('title', 'Quiz')
@section('name', $student->name)
@section('content')
<div class="col-md-10 col-off-1">
<h2>{{$quiz->title}}</h2>
<hr>
@for($i = 0; $i<count($quiz->questions()); $i++)
<h4>{{$num = $i+1}}. {{$quiz->questions()[$i]->question}}</h4>
		<b>Your Answer: </b>{{$result[$i*3]}}
		<br>
		<b>Correct Answer: </b>{{$result[($i*3)+1]}}
		<br>
		@if($result[($i*3)+2] == 'CORRECT!')
		<div style="color:green"><b>{{$result[($i*3)+2]}}</b></div>
		@else
		<div style="color:red"><b>{{$result[($i*3)+2]}}</b></div>
		@endif
		<hr>
			<!--<div class="radio">
			  <label>
			    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
			    {{$quiz->questions()[$i]->answer}}
			  </label>
			</div>
			<div class="radio">
			  <label>
			    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
			    {{$quiz->questions()[$i]->option1("hello")}}
			  </label>
			</div>
			<div class="radio">
			  <label>
			    <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">
			    {{$quiz->questions()[$i]->option2}}
			  </label>
			</div>
			<div class="radio">
			  <label>
			    <input type="radio" name="optionsRadios" id="optionsRadios3" value="option4">
			    {{$quiz->questions()[$i]->option3}}
			  </label>
			</div>-->
@endfor
<h3><b>Your Score: {{$result[count($result)-1]}} / {{count($quiz->questions())}}</b></h3>
<form action={{route('student.dashboard')}}>
<button class="btn">Go back</button>
</form>
</div>
@endsection