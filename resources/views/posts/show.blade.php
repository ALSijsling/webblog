<x-layout>
    <article id="post">
        <h1>{{ $post->title }}</h1>
        <h5>{{ $post->created_at->toDateString() }}</h5>
                
        @foreach ($categories as $category)
            <a class="catLink" href="{{route('categories.show', ['category' => $category])}}">{{$category->name}}</a>
        @endforeach
        
        <div id="article">{!! $post->article !!}</div>
                
        @foreach ($comments as $comment)
            <div class="comment">
                <h3>{{ $comment->user->name }}</h3>
                <p>{{ $comment->comment }}</p>
            </div>
        @endforeach

        <form id="addComment" method="POST" action="{{route('posts.comments.store', ['post' => $post])}}">
        @csrf

            <h3>Join the conversation</h3>

            <textarea id="comment" name="comment" rows="5" value="{{ old('comment') }}"></textarea><br><br>

            <input class="postBtn" type="submit" value="Post">
        </form>
        <x-error/>
    </article>
</x-layout>