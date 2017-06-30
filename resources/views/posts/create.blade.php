@extends('layouts.app')

@section('content')
	<div class="col-md-offset-1">
		<h1>Add Post</h1>
	</div>
	<br>
	<div class="col-md-10">
	<form class="form-horizontal" action="/posts" method="POST">
    {{ csrf_field() }}
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        <div class="form-group">
          <label class="control-label col-md-2" for="title">Title:</label>
          <div class="col-md-10">
            <input type="text" class="form-control" id="title" name="title" placeholder="Enter title">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-2" for="body">Body:</label>
          <div class="col-md-10">
            <textarea class="form-control" rows="10" id="body" name="body" ></textarea>
          </div>
        </div>
        <div class="form-group">        
          <div class="col-md-offset-2 col-md-10">
            <div class="checkbox">
              <label><input type="checkbox" id="visible" name="visible" >Visible</label>
            </div>
          </div>
        </div>
        <div class="form-group">        
          <div class="col-md-offset-2 col-md-10">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </div>
    </form>
    </div>

@endsection