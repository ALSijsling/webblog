<x-layout>
    <x-admin heading='Categories'>
        <ul>
            @foreach($categories as $category)
            <li class="flex-category-list">
                <div class="name">
                    <p>{{$category->name}}</p>
                </div>
                <div id="category-delete">
                    <form action="{{route('categories.destroy', ['category' => $category])}}" method="POST">
                        <input type="submit" value="Delete">
                        @method('DELETE')
                        @csrf
                    </form>
                </div>
            </li>
            @endforeach
            <li class="flex-category-list">
                <div id="new-category">
                    <form action="{{route('categories.create')}}" method="GET">
                        <input type="submit" value="Create new category">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </x-admin>
</x-layout>