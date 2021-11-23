<x-layout>
    <h1>Hello class</h1>
    @foreach ($roles as $role)
        <p>{{ $role->name }}</p>
    @endforeach
</x-layout>

