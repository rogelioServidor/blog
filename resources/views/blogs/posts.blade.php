@extends('layouts.app2')

@section('content2')
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <br>
            <br>
            <h4>Recent Posts</h4>
            <div class="list-group">
                @forelse($posts as $post)
                    <a href="/blog/{{ $post->user->name }}/{{ $post->id }}" class="list-group-item">{{ $post->title }}</a>
                @empty
                    <p>Zero Post</p>
                @endforelse
            </div>
        </div>

        <div class="col-md-10">
            <div>
                <h2>{{ strtoupper($userName->name) }} - Blog Posts</h2>
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
                    <a href="/blog/{{ $post->user->name }}/{{ $post->id }}" class="btn btn-primary">Comment</a>
                    <!-- <a href="/posts/{{$post->id}}/edit" class="btn btn-danger pull-right">Edit / Delete</a> -->
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

@endsection
