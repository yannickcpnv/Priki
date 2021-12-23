<article>
    <div class="is-flex is-flex-direction-column is-justify-content-center">
        <div class="card my-3">
            <header class="card-header has-background-primary">
                <h2 class="card-header-title has-text-light">
                    {{ $practice->domain->name }}
                </h2>
            </header>
            <div class="card-content">
                <section class="content has-text-justified">
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
                </section>
            </div>
        </div>

        <div class="p-4">
            @if ($practice->opinions->count())
                <x-opinions-container :opinions="$practice->opinions"/>
            @endif
        </div>
    </div>
</article>

