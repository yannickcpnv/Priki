<section class="box content" x-data="{selected: null}">
    <h2 class="subtitle is-3">Opinions</h2>
    @if ($practice->opinions->count())
        @foreach ($opinions as $opinion)
            <livewire:opinion-component wire:key="{{ $opinion->id }}" :opinion="$opinion" :practice="$practice"/>
        @endforeach
    @else
        <x-message :message="'Il n\'y pas encore d\'opinions.'" :type="'info'"/>
    @endif

    <h3 class="title is-4">Ajouter une opinion</h3>
    @auth
        @if (Auth::user()->hasGivenOpinionTo($practice))
            <x-message :message="'Vous avez déjà donné votre opinion pour cette practice.'" :type="'info'"/>
        @else
            <x-forms.opinion-form :practiceId="$practice->id"/>
        @endif
    @else
        <x-message :message="__('Login needed', ['action' => 'donner votre opinion'])"
                   :type="'info'"
        />
    @endauth
</section>

