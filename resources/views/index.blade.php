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
            <h1>Hello World</h1>
        @endsection
    </body>

</html>