<div
    class="{{ $this->classes ?? '' }} anim-for-click"
>
    <a class="no-focus message is-dark box-shadow flex" href="{{ route('practices.view', $practice->id) }}">
        <article class="flex flex-col">
            @if (!$this->isDomainSelected())
                <div class="message-header has-background-primary-dark">{{ $this->practice->domain->name }}</div>
            @endif
            <div class="message-body has-text-justified flex-grow flex flex-col">
                <div class="flex-grow">{{ Str::words($this->practice->description, 50) }}</div>
                <div class="mt-4 grid auto-rows-auto justify-items-end items-end">
                    @if ($this->withState)
                        <div class="tags has-addons mb-0">
                            <span class="tag is-dark">Etat</span>
                            <span class="tag is-info">{{ $this->practice->publicationState->name }}</span>
                        </div>
                    @endif
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
