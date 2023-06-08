<x-layout>
    <x-admin heading="New Blog">
        <form id="newBlog" method="POST" action="{{route('posts.store')}}">
            @csrf
                    
            <label for="title">Title</label><br>
            <input id="title" type="text" name="title" value="{{ old('title') }}"><br><br>
                    
            <label for="article">Text</label><br>
            <textarea id="article" name="article">{{ old('article') }}</textarea><br><br>

            <input class="postBtn" type="submit" value="Post Blog">
        </form>
        <x-error/>
    </x-admin>
</x-layout>