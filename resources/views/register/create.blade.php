<x-layout>
    <div id="registerForm">
        <h2>Register</h2>

        <form method="POST" action="{{route('register.store')}}">
            @csrf
            <label for="name">Name</label><br>
            <input type="text" name="name" value="{{old('name')}}"><br><br>

            <label for="email">Email</labe><br>
            <input type="email" name="email" value="{{old('email')}}"><br><br>

            <label for="password">Password</label><br>
            <input type="password" name="password"><br><br>

            <input class="postBtn" type="submit" value="Register">
        </form>
    </div>
    <x-error/>
</x-layout>