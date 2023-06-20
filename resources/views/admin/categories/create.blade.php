<x-layout>
    <x-admin heading="Create new category">
        <form id="category" method="POST" action="{{route('categories.store')}}">
            @csrf
                    
            <label for="name">Name</label><br>
            <input id="name" type="text" name="name" value="{{ old('name') }}"><br><br>

            <input type="submit" value="Create category">
        </form>
        <x-error/>
    </x-admin>
</x-layout>