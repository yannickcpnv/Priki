@props(['opinions', 'practice'])
@push('custom-scripts')
    <script src="{{ mix('js/confirm.js') }}"></script>
@endpush

<section class="box content" x-data="{selected: null}">
    <h2 class="subtitle is-3">Opinions</h2>
    @if ($practice->opinions->isNotEmpty())
        @foreach ($opinions as $opinionIndex => $opinion)
            <div class="block" x-data="{ key: {{ $opinionIndex }} }">
                <x-opinion-card :opinion="$opinion" :practice="$practice"/>
            </div>
        @endforeach
    @else
        <x-message :message="'Il n\'y pas encore d\'opinions.'" :type="'info'"/>
    @endif

    <h3 class="title is-4">Ajouter une opinion</h3>
    @auth
        @if (Auth::user()->hasGivenOpinionTo($practice))
            <x-message :message="'Vous avez déjà donné votre opinion pour cette practice.'" :type="'info'"/>
        @else
            <x-forms.create-opinion-form :practiceId="$practice->id"/>
        @endif
    @else
        <x-message :message="__('Login needed', ['action' => 'donner votre opinion'])"
                   :type="'info'"
        />
    @endauth
</section>
