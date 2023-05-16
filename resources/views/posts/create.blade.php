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
            <form id="newBlog" method="POST" action="{{route('posts.store')}}">
                @csrf

                <h1>New Blog</h1>

                <input type="hidden" name="user_id" value="1">
                
                <label for="title">Title</label><br>
                <input id="title" type="text" name="title" value=""><br><br>
                
                <label for="article">Text</label><br>
                <textarea id="article" name="article"></textarea><br><br>

                <input id="postBtn" type="submit" value="Post Blog">
            </form>
        @endsection
        
    </body>

</html>