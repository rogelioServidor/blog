@extends('layouts.app')

@section('content')
<div class="col-md-offset-1">
  <h2>Comment</h2>
</div>
<br>
  
  <div class="col-md-10 col-md-offset-1">
  <div class="panel panel-default">
    <div class="panel-heading"><h2>{{ $post->title }}</h2></div>
    <div class="panel-body"><h3>{{ $post->body }}</h3></div>
  <div class="panel-footer clearfix">    
  <br>
  @foreach($post->comments as $c)
      <div class="media">
          <div class="media-left">
              <img src="https://cdn1.iconfinder.com/data/icons/ninja-things-1/1772/ninja-simple-512.png" class="media-object" style="width:60px">
          </div>
          <div class="media-body">
            <h4 class="media-heading">{{ $c->name }}</h4>
            <p>{{ $c->comment }}</p>
          </div>
      </div>
      <hr>
  @endforeach
    <div>
      <form class="form-vertical" action="/comments" method="POST">
      {{ csrf_field() }}
      <input type="hidden" name="post_id" value="{{ $post->id }}">
      <input type="hidden" name="name" value="{{$post->user->name}}">
      <input type="hidden" name="email" value="{{$post->user->email}}">
      <div class="form-group {{ $errors->has('comment') ? 'has-error' : '' }}">
        <div class="col-md-12">
          <textarea class="form-control" rows="10" id="comment" name="comment" placeholder="Comment Here"></textarea>

          @if($errors->has('comment'))
            <span class="help-block">
              <strong>{{ $errors->first('comment') }}</strong>
            </span>
          @endif
        </div>
      </div>
      <div class="form-group">   
        <div class="col-md-12 text-center">
          <br>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </div>
      </form>
    </div>

    </div>
  </div>
  </div>
  
@endsection