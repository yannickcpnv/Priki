<x-layout>
    <x-slot name="titlePage">Modification d'une practice</x-slot>

    <div class="box">
        {{--{{ route('practices.update') }}--}}
        <form method="post" action="#">
            @csrf
            <div class="field">
                <label class="label" for="title">Titre</label>
                <div class="control">
                    <input class="input"
                           id="title"
                           max="40"
                           min="3"
                           name="description"
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
                             minlength="10"
                             maxlength="5000"
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
