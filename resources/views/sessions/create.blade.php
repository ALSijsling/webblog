<x-layout>
    <div id="logInForm">
        <h2>Log In</h2>

        <form method="POST" action="{{route('login.store')}}">
            @csrf

            <label for="email">Email</label><br>
            <input type="email" name="email" value="{{old('email')}}"><br><br>

            <label for="password">Password</label><br>
            <input type="password" name="password"><br><br>

            <input class="postBtn" type="submit" value="Log In">
        </form>
    </div>
    <x-error/>
</x-layout>