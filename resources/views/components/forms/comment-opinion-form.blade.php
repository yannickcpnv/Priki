@props(['practiceId', 'opinionId', 'id' => 0])

<form method="post" action="{{ route('opinions.comment.store') }}">
    @csrf

    <input type="hidden" name="practice_id" value="{{ $practiceId }}">
    <input type="hidden" name="opinion_id" value="{{ $opinionId }}">

    <div class="field">
        <label class="label" for="comment[{{ $id }}]">Commentaire</label>
        <div class="control">
            <textarea class="textarea"
                      id="comment[{{ $id }}]"
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
        <label class="label" for="points[{{ $id }}]">Positif/Négatif</label>
        <div class="control">
            <div class="select">
                <select id="points[{{ $id }}]" name="points">
                    <option value="0">Neutre</option>
                    <option value="1">Positif</option>
                    <option value="-1">Négatif</option>
                </select>
            </div>
        </div>
    </div>

    <div class="field">
        <div class="control has-text-right">
            <input type="submit" class="button is-primary" value="Commenter">
        </div>
    </div>
</form>
