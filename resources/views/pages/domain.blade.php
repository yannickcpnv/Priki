<x-layout>
    <x-slot name="titlePage" class="is-primary">Best practices</x-slot>
    <div class="box">
        @foreach ($domains as $domain)
            <p>{{ $domain->name }}</p>
        @endforeach
    </div>
</x-layout>
