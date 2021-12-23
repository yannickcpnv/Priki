<x-layout>
    <x-slot name="titlePage">Liste des références</x-slot>

    <section class="content">
        <table>
            <caption>Références avec lien</caption>
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
