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
            @foreach ($posts as $post)
                <article class='post'>
                    <a href="{{route('posts.show', ['post' => $post])}}"><h1>{{ $post->title }}</h1></a>
                    <h5>{{ $post->created_at->toDateString() }}</h5>
                    <div class='article'>{!! Str::words($post->article, 100) !!}</div>
                </article>
            @endforeach
        @endsection
    </body>

</html>