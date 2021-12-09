<article>
    <div class="is-flex is-justify-content-center">
        <div class="lg:w-3/4">
            <div class="card my-3">
                <header class="card-header has-background-primary">
                    <p class="card-header-title has-text-light">
                        {{ $practice->domain->name }}
                    </p>
                </header>
                <div class="card-content">
                    <div class="content has-text-justified">
                        <div>
                            {{ $practice->description }}
                        </div>
                        <div class="mt-3 has-text-right">
                            <em>Crée le
                                <time datetime="{{ $practice->created_at->format('Y-m-d') }}">
                                    {{ $practice->created_at->isoFormat('LL') }}
                                </time>
                            </em>
                            <br>
                            <em>Modifié le
                                <time datetime="{{ $practice->updated_at->format('Y-m-d') }}">
                                    {{ $practice->updated_at->isoFormat('LL') }}
                                </time>
                            </em>
                        </div>
                    </div>
                </div>
            </div>
            <a class="button is-link w-full lg:w-1/4" href="{{ url()->previous() }}">{{ __('Go back') }}</a>
        </div>
    </div>
</article>

