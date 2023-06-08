<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title>Weblog</title>
        
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="{{asset('css/nav.css')}}">
        <link rel="stylesheet" href="{{asset('css/admin.css')}}">
        <!-- icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    </head>

    <body>
        <div id="navBar">
            <a href="{{route('home')}}">Home</a>
            <div id="dropdown">
                <button id="dropbtn">Categories<i class="fa fa-caret-down"></i></button>
                <div id="dropdown-content">
                    <a href="#">Cat 1</a>
                    <a href="#">Cat 2</a>
                    <a href="#">Cat 3</a>
                </div>
            </div>
            <form id="searchBar">
                <input type="text" placeholder="Search..">
                <button type="submit"><i class="fa fa-fw fa-search"></i></button>
            </form>
            <div id="users">
                @auth
                    <x-dropdown>
                        <x-slot name="trigger">
                            <button>
                                {{auth()->user()->name}} <i class='fa fa-user'></i>
                            </button>
                        </x-slot>

                        <x-dropdown-item 
                            href="{{route('posts.index')}}"
                        >Dashboard
                        </x-dropdown-item>

                        <x-dropdown-item
                            href="#"
                            x-data="{}"
                            @click.prevent="document.querySelector('#logout-form').submit()"
                        >Log Out
                        </x-dropdown-item>

                        <form id="logout-form" method="POST" action="{{route('sessions.destroy')}}" class="hidden">
                            @csrf
                        </form>
                    </x-dropdown>
                    
                @else
                    <a href="{{route('register.create')}}">Register</a>
                    <a href="{{route('login.create')}}">Log In</a>
                @endauth
            </div>
        </div>

        <main>
            {{$slot}}
        </main>

        <x-flash/>
    </body>

</html>