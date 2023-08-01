<x-layout>
    @if ($posts->count())
        @foreach ($posts as $post)
            <article class="post">
                <div class="post-heading">
                    <div class="post-image">
                        <img src="{{asset('storage/' . $post->image)}}" alt="">
                    </div>
                    <div class="post-meta">
                        <a href="{{route('posts.show', ['post' => $post])}}"><h1>{{ $post->title }}</h1></a>
                        <h5>{{ $post->created_at->toDateString() }}</h5>
                    </div>
                </div>

                <div class="article">{!! Str::words($post->article, 100) !!}</div>

                @foreach($post->categories as $category)
                    <a class="catLink" href="{{route('categories.show', ['category' => $category])}}">{{$category->name}}</a>
                @endforeach
            </article>
        @endforeach
    @else
        <p>No posts</p>
    @endif
</x-layout>