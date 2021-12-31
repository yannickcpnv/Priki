<x-layout>
    <x-slot name="titlePage" class="has-text-centered">
        Création d'une nouvelle référence
    </x-slot>

    <div class="columns is-centered">
        <div class="column is-three-fifths">
            <div class="box">
                <form action="{{ route('references.store') }}">
                    <div class="field">
                        <label class="label" for="description">Description</label>
                        <div class="control">
                            <input class="input"
                                   id="description"
                                   name="description"
                                   type="text"
                                   required
                                   pattern="\s*(\S\s*){10,}"
                                   title="La description doit faire au moins 10 caractères (sans compter les espaces)."
                            >
                        </div>
                    </div>

                    <div class="field">
                        <label class="label" for="url">Url</label>
                        <div class="control">
                            <input class="input" id="url" name="url" type="url">
                        </div>
                    </div>

                    <div class="field">
                        <div class="control">
                            <input type="submit" class="button is-success is-fullwidth" value="Créer">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
