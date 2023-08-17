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
            <x-category-dropdown/>
            <form id="searchBar" method="GET" action="#">
                <input type="text" name="search" placeholder="Search.." value="{{request('search')}}">
                <button type="submit"><i class="fa fa-fw fa-search"></i></button>
            </form>
            <div id="users">
                @auth
                    <div id="user-dropdown">
                        <button class="dropbtn">
                            {{auth()->user()->name}} <i class='fa fa-user'></i>
                        </button>

                        <div id="user-item">
                        @can('admin')
                            <a href="{{route('posts.index')}}">Dashboard</a>
                        @endcan
                            <a href="#" x-data="{}" @click.prevent="document.querySelector('#logout-form').submit()">Log Out</a>
                        </div>
                        
                        <form id="logout-form" method="POST" action="{{route('sessions.destroy')}}" class="hidden">
                            @csrf
                        </form>
                    </div>
                    
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

        @auth
            @if(!auth()->user()->newsletter == 1)
                <footer>
                    <form id="newsletter" method="POST" action="{{route('newsletter.store')}}">
                        @csrf
                        <input id="newsletterBtn" type="submit" value="Subscribe to the Newsletter">
                    </form>
                </footer>
            @endif
        @endauth
    </body>

</html>