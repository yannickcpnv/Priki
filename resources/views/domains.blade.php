<x-layout>
    <x-slot name="title">Domains</x-slot>
    <div class="box">
        @foreach ($domains as $domain)
            <p>{{ $domain->name }}</p>
        @endforeach
    </div>
</x-layout>
