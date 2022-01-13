<x-layout>
    <x-slot name="titlePage">Liste des références</x-slot>

    <a href="{{ route('references.create') }}" class="button is-primary">Ajouter une référence</a>

    <section class="content">
        <table>
            <caption>Références</caption>
            <thead>
                <tr>
                    <th id="description">Description</th>
                </tr>
            </thead>
            <tbody>
                @foreach($references as $reference)
                    <tr>
                        <td>
                            {{ $reference->description }}
                            @if ($reference->hasUrl())
                                <a href="{{ $reference->url }}" target="_blank">
                                    <span class="icon is-small">
                                        <em class="fas fa-external-link-alt"></em>
                                    </span>
                                </a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
</x-layout>
