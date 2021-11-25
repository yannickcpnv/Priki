<x-layout>
    <x-slot name="titlePage">Hello class</x-slot>
    @foreach ($roles as $role)
        <p>{{ $role->name }}</p>
    @endforeach
</x-layout>

