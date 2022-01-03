<x-layout>
    <x-slot name="titlePage" class="has-text-centered">
        Création d'une nouvelle référence
    </x-slot>

    <div class="columns is-centered">
        <div class="column is-three-fifths">
            <div class="box">
                <form method="post" action="{{ route('references.store') }}">
                    @csrf
                    <div class="field">
                        <label class="label" for="description">Description</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input"
                                   id="description"
                                   name="description"
                                   type="text"
                                   required
                                   pattern="\s*(\S\s*){10,}"
                                   title="La description doit faire au moins 10 caractères (sans compter les espaces)."
                            >
                            <span class="icon is-small is-left">
                                <em class="fas fa-quote-left"></em>
                            </span>
                            <span class="icon is-small is-right">
                                <em class="fas fa-quote-right"></em>
                            </span>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label" for="url">Url</label>
                        <div class="control has-icons-left">
                            <input class="input" id="url" name="url" type="url">
                            <span class="icon is-small is-left">
                                <em class="fas fa-link"></em>
                            </span>
                        </div>
                    </div>

                    <div class="field">
                        <div class="control">
                            <input type="submit" class="button is-primary is-fullwidth" value="Créer">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
