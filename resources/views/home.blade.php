@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <br>
            <br>
            <h4>Recent Posts</h4>
            <div class="list-group">
                @forelse($posts as $post)
                    <a href="/posts/{{ $post->id }}" class="list-group-item">{{ $post->title }}</a>
                @empty
                    <p>Zero Post</p>
                @endforelse
              <!-- <a href="#" class="list-group-item active">First item</a> -->
            </div>
        </div>

        <div class="col-md-10">
            <div>
                <h2>Blog Posts <button class="btn btn-success pull-right" data-toggle="modal" data-target="#myModal">Add Post</button></h2>
            </div>
            <br>

            @forelse($posts as $post)
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
                <br>
                <div class="col-md-12">
                    <a href="/posts/{{$post->id}}" class="btn btn-primary">Comment</a>
                    <a href="/posts/{{$post->id}}/edit" class="btn btn-danger pull-right">Edit / Delete</a>
                </div>
                </div>
            </div>
            @empty
                <div class="panel panel-default">
                    <div class="panel-body">Zero Post</div>
                </div>
            @endforelse
        </div>
      
    </div>
</div>




<div class="container">
 <!--  <h2>Small Modal</h2> -->
  <!-- Trigger the modal with a button -->
  <!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Small Modal</button> -->

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">ADD POST</h4>
        </div>
        <div class="modal-body">
          
            <form class="form-horizontal" action="/posts" method="POST">
            {{ csrf_field() }}
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <div class="form-group">
                  <!-- <label class="control-label col-md-2" for="title">Title:</label> -->
                  <div class="col-md-12">
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter title">
                  </div>
                </div>
                <div class="form-group">
                  <!-- <label class="control-label col-md-2" for="body">Body:</label> -->
                  <div class="col-md-12">
                    <textarea class="form-control" rows="10" id="body" name="body" placeholder="Content"></textarea>
                  </div>
                </div>
                <div class="form-group">        
                  <div class="col-md-12">
                    <div class="checkbox">
                      <label><input type="checkbox" id="visible" name="visible" >Visible</label>
                    </div>
                  </div>
                </div>
                <div class="form-group">        
                  <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </div>
            </form>

        </div>
        <!-- <div class="modal-footer">
          <button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Add</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div> -->
      </div>
    </div>
  </div>
</div>
@endsection
