<x-layout>
    <x-admin heading="Manage Posts">
        <ul>
            @foreach($posts as $post)
            <li class="flex-post-list">
                <div class="title">
                    <a href="{{route('posts.show', ['post' => $post])}}">{{$post->title}}</a>
                </div>
                <div id="post-edit">
                    <form action="{{route('posts.edit', ['post' => $post])}}" method="GET">
                        <input type="submit" value="Edit">
                        @csrf
                    </form>
                </div>
                <div id="post-delete">
                    <form id="post-delete" action="{{route('posts.destroy', ['post' => $post])}}" method="DELETE">
                        <input type="submit" value="Delete">
                        @method('DELETE')
                        @csrf
                    </form>
                </div>
            </li>
            @endforeach
        </ul>
    </x-admin>
</x-layout>
