<x-layout>
    <x-admin heading="New Blog">
        <form id="Blog" method="POST" action="{{route('posts.store')}}">
            @csrf
                    
            <label for="title">Title</label><br>
            <input id="title" type="text" name="title" value="{{ old('title') }}"><br><br>
                    
            <label for="article">Text</label><br>
            <textarea id="article" name="article">{{ old('article') }}</textarea><br><br>

            <label for="categories">Select Categories</label><br>
            @foreach ($categories as $category)
                <input id="category" type="checkbox" name="category[]" value="{{$category->id}}"
                    {{(is_array(old('category')) and in_array($category->id, old('category'))) ? 'checked' : ''}}>
                <label for="categories">{{$category->name}}</label><br>
            @endforeach
            <br>
            <input class="postBtn" type="submit" value="Post Blog">
        </form>
        <x-error/>
    </x-admin>
</x-layout>