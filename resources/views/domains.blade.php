<x-layout>
    <h1>Hello class</h1>
    @foreach ($domains as $domain)
        <p>{{ $domain->name }}</p>
    @endforeach
</x-layout>
