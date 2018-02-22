@extends('master')


@section('content')


                <h1 class="page-header">
                    First Post
                    
                </h1>

                <!-- First Blog Post -->

                
                <h2>
                    <a href="#">{{ $post->title }}</a>
                </h2>
                <p class="lead">
                    by <a href="index.php">Abdullah Awwad</a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on August 28, 2013 at 10:00 PM</p>
                <hr>
                @if ($post->url)

                    <p><img src="../upload/{{ $post->url }}" alt="img"></p>

                @endif
                <hr>

                <p style="font-size: 25px;">{{ $post->body }}</p>

                <br>

                <div class="comments">
                        
                    @foreach($post->comments as $comment)
                        <p class="comment">{{ $comment->body }}</p>
                    @endforeach

                </div>

                <br>

                <form method="POST" action="/posts/{{ $post->id }}/store">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="body">Write Comment</label>
                        <textarea name="body" id="body" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Add Comment</button>
                    </div>

                </form>

                <hr>
                

                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>


@stop