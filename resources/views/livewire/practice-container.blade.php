<section>
    <label class="field is-grouped is-grouped-right is-align-items-center">
        <div>Nouveau de&nbsp;</div>
        <input
            wire:model="days"
            wire:change="onDaysUpdate"
            class="input is-inline"
            type="number"
            min="1"
            size="3"
            style="-moz-appearance: textfield"
        >
        <div>&nbsp;jour{{ $this->days > 1 ? 's' : '' }}</div>
    </label>
    @if($this->practices->isNotEmpty())
        <div class="columns is-multiline">
            @foreach ($this->practices as $practice)
                <livewire:practice-card-component
                    :practice="$practice"
                    :classes="'column is-one-third is-flex'"
                    :with-domain="!$this->isDomainSection"
                    :key="$practice->id"
                />
            @endforeach
        </div>
    @else
        <x-message
            :message="'Aucune pratique à afficher ici'"
            :type="'info'"
        />
    @endif
</section>
