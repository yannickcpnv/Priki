<div
    class="
        {{ $this->classes ?? '' }}
        hover:scale-110 hover:cursor-pointer hover:z-10
        transition duration-500 animate-fade-in-up
    "
>
    <a class="no-focus message box-shadow flex" href="{{ route('practice', $practice->id) }}">
        <article class="flex flex-col">
            @if (!$this->isDomainSelected())
                <div class="message-header">{{ $this->practice->domain->name }}</div>
            @endif
            <div class="message-body has-text-justified break-all flex-grow flex flex-col">
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
    </a>
</div>
