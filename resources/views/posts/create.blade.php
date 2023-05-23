<x-layout>
    <form id="newBlog" method="POST" action="{{route('posts.store')}}">
        @csrf

        <h1>New Blog</h1>

        <input type="hidden" name="user_id" value="1">
                
        <label for="title">Title</label><br>
        <input id="title" type="text" name="title" value="{{ old('title') }}"><br><br>
                
        <label for="article">Text</label><br>
        <textarea id="article" name="article" value="{{ old('article') }}"></textarea><br><br>

        <input class="postBtn" type="submit" value="Post Blog">
    </form>
    <x-error/>
</x-layout>