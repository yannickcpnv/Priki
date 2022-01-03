@props(['practiceId'])

<form action="{{ route('opinions.store') }}">
    @csrf

    <input type="hidden" name="practice_id" value="{{ $practiceId }}">

    <div class="field">
        <div class="control has-text-right">
            <input type="submit" class="button is-primary" value="Donnez votre opinion">
        </div>
    </div>
</form>
