<div class="column is-one-third is-flex" wire:key="{{ $practice->id }}">
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
