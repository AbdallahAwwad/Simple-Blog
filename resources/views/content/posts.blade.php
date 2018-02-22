@extends('master')


@section('content')


                <h1 class="page-header">
                    All Posts
                </h1>

                <!-- First Blog Post -->

                @foreach($posts as $post)
                <h2>
                    <a href="../posts/{{ $post->id }}">{{ $post->title }}</a>
                </h2>
                <p class="lead">
                    by <a href="index.php">Abdullah Awwad</a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span>

                    Posted On {{ $post->created_at }} - 

                    <strong>Category:</strong>

                    <a href="../category/{{ $post->category->name }}" target="blank">
                     {{ $post->category->name }}
                    </a>
                </p>
                <hr>

                @if ($post->url)

                    <p><img src="upload/{{ $post->url }}" alt="img"></p>

                @endif

                <p style="font-size: 25px;">{{ $post->body }}</p>
                <hr>
                <a class="btn btn-primary" href="../posts/{{ $post->id }}">Read More<span class="glyphicon glyphicon-chevron-right"></span></a>

                @php
                    $like_count = 0;
                    $dislike_count = 0;

                    $like_status = "btn-secondary";
                    $dislike_status = "btn-secondary";
                @endphp

                @foreach ($post->likes as $like)

                    @php

                    if($like->like == 1)
                        $like_count++;

                    if(Auth::check())
                    {
                        if($like->like == 0)
                            $dislike_count++;

                        if($like->like == 1 && $like->user_id == Auth::user()->id)
                            $like_status = "btn-success";

                        if($like->like == 0 && $like->user_id == Auth::user()->id)
                            $dislike_status = "btn-danger";

                    }

                    @endphp

                @endforeach

                <button type="button" data-postid="{{ $post->id }}_l" data-like="{{ $like_status }}" class="like btn {{ $like_status }}">Like
                 <span class="glyphicon glyphicon-thumbs-up"></span>
                  <b><span class="like_count">{{ $like_count }}</span></b>
              </button>

                <button type="button" data-postid="{{ $post->id }}_d" data-like="{{ $dislike_status }}" class="dislike btn {{ $dislike_status }}">Dislike
                 <span class="glyphicon glyphicon-thumbs-down"></span>
                  <b><span class="dislike_count">{{ $dislike_count }}</span></b>
              </button>

                <hr>
                @endforeach

                @if(Auth::check())
                    @if(Auth::user()->hasRole('Admin') || Auth::user()->hasRole('Editor') )

                    <form method="POST" action="/posts/store" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="body">Body</label>
                            <textarea name="body" id="body" class="form-control"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="url">Image</label>
                            <input type="file" name="url" id="url">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Add Post</button>
                        </div>

                    </form>
                    @endif
                @endif

                <div>
                    
                    @foreach ($errors->all() as $error)
                        <b>{{ $error }}</b> <br>
                    @endforeach
                </div>

                <!-- Pager -->
               <!-- <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul> -->


@stop