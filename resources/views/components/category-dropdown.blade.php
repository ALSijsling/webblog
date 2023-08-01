<div id="category-dropdown">
    <button class="dropbtn">Categories<i class="fa fa-caret-down"></i></button>
    <div id="dropdown-content">
        @foreach ($categories as $category)
            <a href="{{route('categories.show', ['category' => $category])}}">{{$category->name}}</a>
        @endforeach
    </div>
</div>