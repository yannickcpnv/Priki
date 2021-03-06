<x-layout>
    <x-slot name="titlePage">
        Création d'une nouvelle référence
    </x-slot>

    <div class="box">
        <form method="post" action="{{ route('references.store') }}">
            @csrf
            <div class="field">
                <label class="label" for="description">Description</label>
                <div class="control has-icons-left has-icons-right">
                    <input id="description"
                           class="input"
                           name="description"
                           type="text"
                           required
                           value="{{ old('description') }}"
                           title="La description doit faire au moins 10 caractères (sans compter les espaces)."
                    >
                    <span class="icon is-small is-left">
                        <em class="fas fa-quote-left"></em>
                    </span>
                    <span class="icon is-small is-right">
                        <em class="fas fa-quote-right"></em>
                    </span>
                </div>
                @error('description')
                <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="field">
                <label class="label" for="url">Url</label>
                <div class="control has-icons-left">
                    <input id="url"
                           class="input"
                           name="url"
                           type="url"
                           value="{{ old('url') }}"
                    >
                    <span class="icon is-small is-left">
                        <em class="fas fa-link"></em>
                    </span>
                </div>
                @error('url')
                <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="field">
                <div class="control">
                    <input type="submit" class="button is-primary is-fullwidth" value="Créer">
                </div>
            </div>
        </form>
    </div>
</x-layout>
