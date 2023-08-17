<x-layout>
    <h3>Become a Premium member</h3>
    <form method="POST" action="{{route('premium.store')}}">
        @csrf
        <button type="submit">Become a Premium member</button>
    </form>
</x-layout>