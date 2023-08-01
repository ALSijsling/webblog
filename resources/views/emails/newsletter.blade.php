<!DOCTYPE html>
<html lang="en">
<body>
    <p>Hello,</p>

    <p>This is the weekly newsletter with all new posts</p>

    <div>
        <ul>
            @foreach ($posts as $post)
                <li><a href="">{{$post->title}}</a></li>
            @endforeach
        </ul>
    </div>
</body>
</html>