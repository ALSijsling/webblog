@props(['heading'])

<section>
    <h2 id="heading">
        {{$heading}}
    </h2>

    <div id="flex-admin">
        <aside>
            <ul>
                <li>
                    <a href="{{route('posts.index')}}">Posts</a>
                </li>
                <li>
                    <a href="{{route('posts.create')}}">New Blog</a>
                </li>
            </ul>
        </aside>

        <main>
            {{$slot}}
        </main>
    </div>
</section>