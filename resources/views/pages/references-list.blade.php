<x-layout>
    <x-slot name="titlePage">Liste des références</x-slot>

    <div x-data="{ open: false }">
        <button @click="open = true" class="button is-primary">Ajouter une référence</button>

        <div class="modal is-active"
             x-show="open"
        >
            <div class="modal-background"></div>
            <div class="modal-card"
                 @click.away="open = false"
            >
                <form action="">
                    <header class="modal-card-head">
                        <p class="modal-card-title">Ajouter une référence</p>
                        <button class="delete" aria-label="close" @click="open = false"></button>
                    </header>
                    <section class="modal-card-body">
                        Modal content
                    </section>
                    <footer class="modal-card-foot">
                        <input type="submit" class="button is-success" value="Save Changes">
                        <button class="button" @click="open = false">Cancel</button>
                    </footer>
                </form>
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
