<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Weblog</title>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <!-- icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    </head>

    <body>

        <div id="navBar">
            <a href="{{route('index')}}">Home</a>
            <button class="dropbtn">Dropdown<i class="fa fa-caret-down"></i></button>
                
            <form id="searchBar">
                <input type="text" placeholder="Search..">
                <button type="submit"><i class="fa fa-fw fa-search"></i></button>
            </form>
        </div>

    </body>

</html>