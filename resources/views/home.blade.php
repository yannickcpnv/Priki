<x-layout>
    <x-slot name="titlePage">Best practices</x-slot>
    @foreach ($practices as $practice)
        <article class="message">
            <div class="message-body">
                <div>{{ $practice->description }}</div>
                <div class="has-text-right">
                    <em>
                        <small>Modifié le {{ $practice->getSwitzerlandDate() }}</small>
                    </em>
                </div>
            </div>
        </article>
        <address></address>
    @endforeach
</x-layout>
