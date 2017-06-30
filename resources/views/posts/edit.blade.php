@extends('layouts.app')

@section('content')
<div class="col-md-offset-2 col-md-8">
  <h2>Edit / Delete Post  
    <button type="submit" id="delete_btn" class="btn btn-warning pull-right">Delete</button> 
  </h2>
  <form id="delete_form" action="/posts/{{ $post->id }}" method="POST">
    {{ method_field('DELETE') }}
    {{ csrf_field() }}
    <!-- <input type="hidden" name="id" value="{{ $post->id }}"> -->
    <!-- <h2>Edit / Delete Post  
      <button type="submit" class="btn btn-warning pull-right">Delete</button> 
    </h2> -->
  </form>
  <br>  
</div>

<div class="col-md-offset-1 col-md-10">
    <form class="form-horizontal" action="/posts/{{ $post->id }}" method="POST">
    {{ method_field('PUT') }}
    {{ csrf_field() }}
    <!-- <input type="hidden" name="user_id" value="{{ $post->id }}"> -->
    <div class="form-group">
      <label class="control-label col-md-1" for="title">Title:</label>
      <div class="col-md-10">
        <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" value="{{ $post->title }}">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-md-1" for="body">Body:</label>
      <div class="col-md-10">
        <textarea class="form-control" rows="10" id="body" name="body">{{ $post->body }}</textarea>
      </div>
    </div>
    <div class="form-group">        
      <div class="col-md-offset-1 col-md-10">
        <div class="checkbox">
          <label><input type="checkbox" id="visible" name="visible" {{ $post->visible == 1 ? "checked" : ""}}>Visible</label>
        </div>
      </div>
    </div>
    <div class="form-group">        
      <div class="col-md-offset-1 col-md-10">
        <button type="submit" class="btn btn-primary">Edit</button>
      </div>
    </div>
    </form>
  </div>

<script>
 
    $('#delete_btn').on('click', function(){
        swal({   
          title: "Are you sure you want to delete this post?",
          text: "You will not be able to recover this.",         type: "warning",   
          showCancelButton: true,   
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Yes, delete it!", 
          closeOnConfirm: false 
        }, 
          function(){   
          $("#delete_form").submit();
        });
      })
    
</script>
@endsection