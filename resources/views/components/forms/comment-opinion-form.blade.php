@props(['practiceId', 'opinionId', 'index' => 0])

<form method="post" action="{{ route('opinions.comment.store') }}">
    @csrf

    <input type="hidden" name="practice_id" value="{{ $practiceId }}">
    <input type="hidden" name="opinion_id" value="{{ $opinionId }}">

    <div class="field">
        <label class="label" for="comment[{{ $index }}]">Commentaire</label>
        <div class="control">
            <textarea class="textarea"
                      id="comment[{{ $index }}]"
                      name="comment"
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
        <label class="label" for="points[{{ $index }}]">Positif/Négatif</label>
        <div class="control">
            <div class="select">
                <select id="points[{{ $index }}]" name="points">
                    <option value="0">Neutre</option>
                    <option value="1">Positif</option>
                    <option value="-1">Négatif</option>
                </select>
            </div>
        </div>
    </div>

    <div class="field">
        <div class="control has-text-right">
            <input type="submit" class="button is-success" value="Ajouter le commentaire">
        </div>
    </div>
</form>
