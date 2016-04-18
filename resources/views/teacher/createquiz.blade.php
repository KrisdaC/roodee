@extends('layouts.master')
@section('angularjs', 'ng-app="shanidkvApp"')
@extends('includes/header-teacher')
@section('title', 'Create Quiz')
@section('name', $teacher->name)

@section('scripts')
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.25/angular.min.js"></script>
	<script type="text/javascript" src="{{ URL::asset('js/quiz_script.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('js/parsley.min.js') }}"></script>
@endsection

@section('stylesheets')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/quiz_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/parsley.css') }}">
@endsection

@section('title', 'CreateQuiz')
@section('content')
		<div ng-app="angularjs-starter" ng-controller="MainCtrl">

			<div class="row">
			<div class="col-lg-10 col-md-10 col-sm-5 col-xs-12 rowborder">
				<h3>{{$subject->name}} Quiz</h3>
				<hr/>
				<form id="quiz-form" data-parsley-validate="" action="{{route('teacher.postquiz', ['subject' => $subject])}}" method="post">
					<div class="form-group">
						<label for="title">Quiz Title:</label>
						<input class="form-control" type="text" name="title" id="title" required="">
						<hr>
					</div>
					<div class="form-group" data-ng-repeat="question in questions">
					<div ng-switch=question['type']>
						<div ng-switch-when='MC'>
							<h4>Question <%question.id%>:  Multiple Choice</h4>
							<div class="form-group">
								<label for="question">Type in the question:</label>
								<input class="form-control" type="text" id="question" ng-model="question.question" required="">
							</div>
							<div class="form-group">
								<label for="answer">Type in the answer:</label>
								<input class="form-control" type="text" id="answer" ng-model="question.answer" required="">
							</div>
							<div class="form-group">
								<label for="option1">Type in your first option:</label>
								<input class="form-control" type="text" id="option1" ng-model="question.option1" required="">
							</div>
							<div class="form-group">
								<label for="option2">Type in your second option:</label>
								<input class="form-control" type="text" id="option2" ng-model="question.option2" required="">
							</div>
							<div class="form-group">
								<label for="option3">Type in your third option:</label>
								<input class="form-control" type="text" id="option3" ng-model="question.option3" required="">
							</div>
							<button class="btn btn-danger remove" ng-show="$last" ng-click="removeChoice(question.id)">Remove Question</button>
							<hr>
						</div>
						<div ng-switch-when='FITB'>
							<h4>Question <%question.id%>:  Fill in the Blanks</h4>
							<div class="form-group">
								<label for="question">Type in the question:</label>
								<input class="form-control" type="text" id="question" ng-model="question.title" required="">
							</div>
							<div class="form-group">
								<label for="answer">Type in the answer:</label>
								<input class="form-control" type="text" id="answer" ng-model="question.answer" required="">
							</div>
							<button class="btn btn-danger remove" ng-show="$last" ng-click="removeChoice(question.id)">Remove Question</button>
							<hr>
						</div>
					</div>
					</div>
				<button type="submit" class="btn btn-primary">Submit</button>
				<input type="hidden" name="questions" value="<%questions%>">
            	<input type="hidden" name="_token" value="{{ Session::token() }}">
				</form>

				   <!--<fieldset  data-ng-repeat="choice in choices">
				      <select>
				         <option>Mobile</option>
				         <option>Office</option>
				         <option>Home</option>
				      </select>
				      <input type="text" ng-model="choice.name" name="" placeholder="Enter mobile number">
				      <button class="remove" ng-show="$last" ng-click="removeChoice()">-</button>
				   </fieldset>-->

				   <!--<fieldset data-ng-repeat="question in MC">
				   <div ng-switch= question['type']>
				   		<div ng-switch-when='MC'>
				   			<div class="row toprow">
				   			<h4>Multiple Choice</h4>
		        			<div class="col-lg-6 col-md-6 col-sm-5 col-xs-12"><%question.id%>  <input type="text" ng-model="question.title" name="" placeholder="Enter the Question"></div>	
						   	</div>
						   	<div class="row">
						   		<input class = "required" type="text" id="option" ng-model="question.answer" name="" placeholder="Answer">
						   	</div>
						   	<div class="row">
						   		<input type="text" id="option" ng-model="question.option2" name="" placeholder="Second Option">
						   	</div>
						   	<div class="row">
						   		<input type="text" id="option" ng-model="question.option3" name="" placeholder="Third Option">
						   	</div>
						   	<div class="row">
						   		<input type="text" id="option" ng-model="question.option4" name="" placeholder="Fourth Option">
						   	</div>
						   	<div class="row">
						   	 <button class="btn btn-danger remove" ng-show="$last" ng-click="removeChoice(question.id)">
								Remove Question
						   	 </button>
						   	 <hr/>
						   	</div>
				   		</div>
				   	<div ng-switch-when='FITB'>
				   		<div class="row toprow">
				   			<h4>Fill In The Blanks</h4>
		        			<div class="col-lg-6 col-md-6 col-sm-5 col-xs-12"><%question.id%>  <input type="text" ng-model="question.title" name="" placeholder="Enter the Question"></div>	
						</div>
						<div class="row">
						   		<input type="text" id="option" ng-model="question.answer" name="" placeholder="Answer">
						</div>
						<button class="btn btn-danger remove" ng-show="$last" ng-click="removeChoice(question.id)">
								Remove Question
						</button>
						<hr/>
				   	</div>
				   </div>	  	     	      
				   </fieldset>-->
				   
				       
				   <div id="choicesDisplay">
				      <% questions %>
				</div>		
			</div>
			<div class= "col-lg-2 col-md-2 col-sm-7 col-xs-12">
				<h3>Add Questions: </h3>
				<button class="btn btn-primary btn-lg btn-block topbtn" ng-click="addNewMC()">Multiple Choice</button>
				<button class="btn btn-primary btn-lg btn-block" ng-click="addNewFITB()">Fill in the Blanks</button>
				<!--<button class="btn btn-primary btn-lg btn-block" ng-click="addNewMC()">Add New MC</button>-->
			</div>
		</div>

	</div>
@endsection