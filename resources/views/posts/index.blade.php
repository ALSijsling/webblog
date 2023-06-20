<x-layout>
    @foreach ($posts as $post)
        <article class="post">
            <a href="{{route('posts.show', ['post' => $post])}}"><h1>{{ $post->title }}</h1></a>
            <h5>{{ $post->created_at->toDateString() }}</h5>
            <div class="article">{!! Str::words($post->article, 100) !!}</div>

            @foreach($post->categories as $category)
                <a class="catLink" href="{{route('categories.show', ['category' => $category])}}">{{$category->name}}</a>
            @endforeach
        </article>
    @endforeach
</x-layout>