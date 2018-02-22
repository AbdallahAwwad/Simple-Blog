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
                    Posted On {{ $post->created_at }}
                </p>
                <hr>

                @if ($post->url)

                    <p><img src="../upload/{{ $post->url }}" alt="img"></p>

                @endif

                <p style="font-size: 25px;">{{ $post->body }}</p>
                <hr>
                <a class="btn btn-primary" href="../posts/{{ $post->id }}">Read More<span class="glyphicon glyphicon-chevron-right"></span></a>
                <hr>
                @endforeach


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