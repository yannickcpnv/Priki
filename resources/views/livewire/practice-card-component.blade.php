<div class="{{ $this->classes ?? '' }}">
    <article class="message box-shadow flex flex-col">
        <div class="message-header">{{ $this->practice->domain->name }}</div>
        <div class="message-body flex-grow flex flex-col">
            <div class="flex-grow">{{ Str::words($this->practice->description, 50) }}</div>
            <div class="has-text-right mt-4">
                <small>
                    <p>
                        <em>
                            Modifié le
                            <time datetime="{{ $this->practice->updated_at->format('Y-m-d') }}">
                                {{ $this->practice->updated_at->isoFormat('LL') }}
                            </time>
                        </em>
                    </p>
                </small>
            </div>
        </div>
    </article>
</div>
