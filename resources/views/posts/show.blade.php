<x-layout>
    <article id="post">
        <img src="{{asset('storage/' . $post->image)}}" alt="">
        <h1>{{ $post->title }}</h1>
        <h5>{{ $post->created_at->toDateString() }}
            @if($post->is_premium == 1)
                <i class="fa fa-star" style="font-size:18px;color:gold">Premium</i>
            @endif
        </h5>
                
        @foreach ($categories as $category)
            <a class="catLink" href="{{route('categories.show', ['category' => $category])}}">{{$category->name}}</a>
        @endforeach

        @guest
            <div>
                <p>This is a Premium post.<br>Register or log in to become a Premium member</p>
            </div>
        @endguest

        @auth        
            @if(!auth()->user()->is_premium == 1)
                <div>
                    <p>This is a Premium post.</p>
                    
                    <form action="{{route('premium.create')}}">
                        <button type="submit">Become a Premium member</button>
                    </form>
                </div>
            @else
                <div id="article">{!! $post->article !!}</div>
            @endif
        @endauth
                
        @foreach ($comments as $comment)
            <div class="comment">
                <h3>{{ $comment->user->name }}</h3>
                <p>{{ $comment->comment }}</p>
            </div>
        @endforeach

        <!-- TODO: vraag: moet het niet $post->id zijn, ipv $post? -->
        <form id="addComment" method="POST" action="{{route('posts.comments.store', ['post' => $post])}}">
        @csrf

            <h3>Join the conversation</h3>

            <textarea id="comment" name="comment" rows="5" value="{{ old('comment') }}"></textarea><br><br>

            <input class="postBtn" type="submit" value="Post">
        </form>
        <x-error/>
    </article>
</x-layout>