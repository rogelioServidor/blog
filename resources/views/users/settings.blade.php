@extends('layouts.app')

@section('content')
	
	<div class="col-md-8 col-md-offset-2">
	@if(Session::has('message'))
		<div class="alert alert-success text-center">
		  <strong>{{ Session::get('message') }}</strong>
		</div>
	@endif
	<h2>Update Settings</h2>
	<br>
		<form class="form-horizontal" action="/settings/update" method="POST">
        {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ $user->id }}">
            <input type="hidden" name="role" value="{{ $user->role }}">
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
              <label class="control-label col-md-2" for="name">Name:</label>
              <div class="col-md-10">
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" placeholder="Enter Name">

                @if($errors->has('name'))
	              	<span class="help-block">
	              		<strong>{{ $errors->first('name') }}</strong>
	              	</span>
              	@endif
              </div>
            </div>
            <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">
              <label class="control-label col-md-2" for="email">Email:</label>
              <div class="col-md-10">
                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" placeholder="Email Address">

                @if($errors->has('email'))
                	<span class="help-block">
                		<strong>{{ $errors->first('email') }}</strong>
                	</span>
                @endif
              </div>
            </div>
            <div class="form-group {{$errors->has('new_password') ? 'has-error' : ''}}">
              <label class="control-label col-md-2" for="new_password">New Password:</label>
              <div class="col-md-10">
                <input type="password" class="form-control" id="new_password" name="new_password" placeholder="New Password">

                @if($errors->has('new_password'))
                	<span class="help-block">
                		<strong>{{ $errors->first('new_password') }}</strong>
                	</span>
                @endif
              </div>
            </div>
            <div class="form-group {{$errors->has('confirm_password') ? 'has-error' : ''}}">
              <label class="control-label col-md-2" for="confirm_password">Confirm New Password:</label>
              <div class="col-md-10">
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm New Password">

                @if($errors->has('confirm_password'))
                	<span class="help-block">
                		<strong>{{ $errors->first('confirm_password') }}</strong>
                	</span>
                @endif
              </div>
            </div>
            <div class="form-group">        
              <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Update Settings</button>
              </div>
            </div>
        </form>
	</div>

@endsection