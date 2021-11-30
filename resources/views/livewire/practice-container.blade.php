<section>
    <label class="field is-grouped is-grouped-right is-align-items-center">
        <div>Nouveau de&nbsp;</div>
        <input wire:model.debounce.1ms="days"
               wire:change.debounce.1ms="onLastUpdates"
               class="input is-inline"
               type="text"
               size="3"
        >
        <div>&nbsp;Jours</div>
    </label>
    @if($practices->isNotEmpty())
        <div class="columns is-multiline">
            @foreach ($practices as $practice)
                <div class="column is-half is-flex" wire:key="{{ $practice->id }}">
                    <article class="message box-shadow">
                        <div class="message-header">{{ $practice->domain->name }}</div>
                        <div class="message-body">
                            <div>{{ $practice->description }}</div>
                            <div class="has-text-right mt-2">
                                <small>
                                    <p>
                                        <em>
                                            Modifié le
                                            <time datetime="{{ $practice->updated_at->format('Y-m-d') }}">
                                                {{ $practice->updated_at->isoFormat('LL') }}
                                            </time>
                                        </em>
                                    </p>
                                </small>
                            </div>
                        </div>
                    </article>
                </div>
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
