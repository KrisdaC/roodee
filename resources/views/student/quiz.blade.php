@extends('layouts.master')
@extends('includes.header-student')
@section('title', 'Quiz')
@section('name', $student->name)
@section('content')
<div class="col-md-10 col-off-1">
<h2>{{$quiz->title}}</h2>
<form>
@for($i = 0; $i<count($quiz->questions()); $i++)
	@if($quiz->questions()[$i]->type == 'MC')
		<h4>{{$num = $i+1}}. {{$quiz->questions()[$i]->question}}</h4>
			<div class="radio">
			  <label>
			    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
			    {{$quiz->questions()[$i]->answer}}
			  </label>
			</div>
			<div class="radio">
			  <label>
			    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
			    {{$quiz->questions()[$i]->option1}}
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
			</div>
			<hr>
	@endif
	@if($quiz->questions()[$i]->type == 'FITB')
		<h4>{{$num = $i+1}}. {{$quiz->questions()[$i]->question}}</h4>
		<input type="text">
		<hr>
	@endif
@endfor
<button class="btn btn-submit">Submit!</button>
</form>
</div>
@endsection