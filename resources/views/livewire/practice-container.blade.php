<section>
    <label class="field is-grouped is-grouped-right is-align-items-center">
        <div>Nouveau de&nbsp;</div>
        <input wire:model.debounce="days"
               wire:change.debounce="onLastUpdates"
               class="input is-inline"
               type="number"
               size="3"
               style="-moz-appearance: textfield"
        >
        <div>&nbsp;Jours</div>
    </label>
    @if($practices->isNotEmpty())
        <div class="columns is-multiline">
            @foreach ($practices as $practice)
                <livewire:practice-card :practice="$practice" wire:key="{{ $practice->id }}"/>
            @endforeach
        </div>
    @else
        <header class="message is-info box-shadow">
            <div class="message-body">
                Aucune pratique à afficher ici
            </div>
        </header>
    @endif
</section>
