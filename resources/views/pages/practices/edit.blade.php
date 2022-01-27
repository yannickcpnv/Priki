<x-layout>
    <x-slot name="titlePage">Modification d'une practice</x-slot>

    <div class="box">
        <form method="post" action="{{ route('practices.update', $practice->id) }}">
            @csrf
            <div class="field">
                <label class="label" for="title">Titre</label>
                <div class="control">
                    <input class="input"
                           id="title"
                           max="40"
                           min="3"
                           name="title"
                           required
                           type="text"
                           value="{{ $practice->title }}"
                    >
                </div>
                @error('title')
                <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="field">
                <label class="label" for="reason">Raison du changement</label>
                <div class="control">
                   <textarea class="textarea"
                             id="reason"
                             name="reason"
                   ></textarea>
                </div>
                @error('reason')
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
