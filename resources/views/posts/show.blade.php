<x-layout>
    <article id="post">
        <h1>{{ $post->title }}</h1>
        <h5>{{ $post->created_at->toDateString() }}</h5>
        <div id="article">{!! $post->article !!}</div>
                
        @foreach ($comments as $comment)
            <div class="comment">
                <h3>{{ $comment->user->name }}</h3>
                <p>{{ $comment->comment }}</p>
            </div>
        @endforeach

        <form id="addComment" method="POST" action="/posts/{{$post}}/comments">
        @csrf

            <h3>Join the conversation</h3>

            <input type="hidden" name="user_id" value="#">

            <textarea id="comment" name="comment" rows="5" value="{{ old('comment') }}"></textarea><br><br>

            <input class="postBtn" type="submit" value="Post">
        </form>
        <x-error/>
    </article>
</x-layout>