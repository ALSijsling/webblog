<x-layout>
    <x-admin heading="New Blog">
        <form class="blog" method="POST" action="{{route('posts.store')}}" enctype="multipart/form-data">
            @csrf
                    
            <label for="title">Title</label><br>
            <input id="title" type="text" name="title" value="{{ old('title') }}"><br><br>
                    
            <label for="article">Text</label><br>
            <textarea id="article" name="article">{{ old('article') }}</textarea><br><br>

            <label for="image">Image</label>
            <input id="image" type="file" name="image"><br><br>

            <label for="is_premium">Premium</label>
            <input id="premium" type="checkbox" name="is_premium" value=1
                {{old('is_premium') == '1' ? 'checked' : ''}}><br><br>

            <label for="categories">Select Categories</label><br>
            @foreach ($categories as $category)
                <input id="categories" type="checkbox" name="categories[]" value="{{$category->id}}"
                    {{(is_array(old('categories')) and in_array($category->id, old('categories'))) ? 'checked' : ''}}>
                <label for="categories">{{$category->name}}</label><br>
            @endforeach
            <br>

            <input class="postBtn" type="submit" value="Post Blog">
        </form>
        <x-error/>
    </x-admin>
</x-layout>