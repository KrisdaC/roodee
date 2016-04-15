@extends('layouts.master')
@include('includes.header')
@section('title', 'Login Page!')
@section('content')
<div class="row">
	<div class="col-md-6">
        <h3>Sign In</h3>
            <form action="{{route('signin')}}" method="post">
                <div class="form-group">
                    <label for="role_id">Your ID</label>
                    <input class="form-control" type="text" name="role_id" id="role_id">
                </div>
                <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                    <label for="password">Your Password</label>
                    <input class="form-control" type="password" name="password" id="password" value="{{ Request::old('password') }}">
                </div>
                <div class="form-group">
                    <label for="position">Your Position</label>
                    <select class="form-control dropdown-bottom" name="position" id="position">
                        <option value="student">Student</option>
                        <option value="teacher">Teacher</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
    </div>
    <div class="col-md-6">
            <h3>Sign Up</h3>
            <form action="{{route('signup')}}" method="post">
                <div class="form-group">
                    <label for="role_id">Your ID</label>
                    <input class="form-control" type="text" name="role_id" id="role_id">
                </div>
                <div class="form-group">
                    <label for="name">Your Name</label>
                    <input class="form-control" type="text" name="name" id="name">
                </div>
                <div class="form-group">
                    <label for="email">Your E-Mail</label>
                    <input class="form-control" type="text" name="email" id="email">
                </div>
                <div class="form-group">
                    <label for="password">Your Password</label>
                    <input class="form-control" type="password" name="password" id="password">
                </div>
                <div class="form-group">
                    <label for="position">Your Position</label>
                    <select class="form-control dropdown-bottom" name="position" id="position">
                        <option value="student">Student</option>
                        <option value="teacher">Teacher</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
</div>
@endsection