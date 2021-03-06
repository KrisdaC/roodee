@extends('layouts.master')
@extends('includes.header-student')
@section('title', 'Quiz')
@section('name', $student->name)
@section('content')
<div class="col-md-10 col-off-1">
<h2>{{$quiz->title}}</h2>
<hr>
<form action={{route('student.quiz', ['quiz', $quiz])}} method="post">
@for($i = 0; $i<count($quiz->questions()); $i++)
	@if($quiz->questions()[$i]->type == 'MC')
		<h4>{{$num = $i+1}}. {{$quiz->questions()[$i]->question}}</h4>
		{{$rand->generateMC($quiz->questions()[$i])}}
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

			<hr>
	@endif
	@if($quiz->questions()[$i]->type == 'FITB')
		<h4>{{$num = $i+1}}. {{$quiz->questions()[$i]->question}}</h4>
		<input type="text" name= {{$quiz->questions()[$i]->id}}>
		<hr>
	@endif
@endfor
<input type="hidden" name="_token" value="{{ Session::token() }}">
<input type="hidden" name="quiz_id" value={{$quiz->id}}>
<button class="btn btn-submit">Submit!</button>
</form>
</div>
@endsection