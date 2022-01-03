@props(['practiceId'])

<form action="{{ route('opinions.store') }}" method="post">
    @csrf

    <input type="hidden" name="practice_id" value="{{ $practiceId }}">

    <div class="field">
        <label class="label" for="description">Description</label>
        <div class="control">
            <textarea class="textarea"
                      id="description"
                      name="description"
                      minlength="10"
                      maxlength="5000"
                      required
            ></textarea>
        </div>
        <p class="help">
            Le texte doit être compris entre 10 et 5000 caractères.
        </p>
    </div>

    <div class="field">
        <label class="label" for="references">Références</label>
        <div class="control">
            <div class="select is-multiple">
                <select id="references" name="references[]" multiple size="5">
                    @foreach (\App\Models\Reference::all() as $reference)
                        <option value="{{ $reference->id }}">{{ $reference->description }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <p class="help">
            Vous pouvez sélectionner plusieurs références.
        </p>
    </div>

    <div class="field">
        <div class="control has-text-right">
            <input type="submit" class="button is-primary" value="Donnez votre opinion">
        </div>
    </div>
</form>
