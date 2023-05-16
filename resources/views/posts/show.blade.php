<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @extends('layouts.app')
    </head>

    <body>
        @section('navbar')
            @parent
        @endsection

        @section('content')
            <article id="post">
                <h1>{{ $post->title }}</h1>
                <h5>{{ $post->created_at->toDateString() }}</h5>
                <div id="article">{!! $post->article !!}</div>
                
                @foreach ($comments as $comment)
                    <div class="comment">
                        <h3>{{ $comment->user->name }}</h3>
                        <p>{{ $comment->comment }}</p>
                    </div>
                @endforeach

                <form id="addComment" method="POST" action="/posts/{{$post->id}}/comments">
                @csrf

                    <h3>Join the conversation</h3>

                    <input type="hidden" name="user_id" value="2">

                    <textarea id="comment" name="comment" rows="5" value="{{ old('comment') }}"></textarea>
                        @error('title')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    <br><br>

                    <input id="commentBtn" type="submit" value="Post">
                </form>
            </article>

        @endsection    
    </body>

</html>