@props(['practicesGroups'])

<section>
    @if($practicesGroups->isNotEmpty())
        @foreach ($practicesGroups as $key => $practicesGroup)
            <div class="box">
                <h2 class="title is-2 has-text-centered">{{ $key }}</h2>
                <div class="columns is-multiline">
                    @foreach ($practicesGroup as $practice)
                        <livewire:practice-card-component
                            :practice="$practice"
                            :classes="'column is-one-third is-flex'"
                            :with-state="true"
                            :key="$practice->id"
                        />
                    @endforeach
                </div>
            </div>
        @endforeach
    @else
        <x-message
            :message="'Aucune pratique à afficher ici'"
            :type="'info'"
        />
    @endif
</section>
