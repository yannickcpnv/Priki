<x-layout>
    <x-slot name="titlePage">Liste des références</x-slot>

    <div x-data="{ open: false }">
        <a href="{{ route('references.create') }}" class="button is-primary">Ajouter une référence</a>

        <div class="modal is-active"
             x-show="open"
        >
            <div class="modal-background"></div>
            <div class="modal-card"
                 @click.away="open = false"
            >

            </div>
        </div>
    </div>

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
                            @if ($reference->url)
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
