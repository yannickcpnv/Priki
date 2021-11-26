<x-layout>
    @push('custom-scripts')
        <script defer src="{{ mix('js/last_practices_updated.js') }}"></script>
    @endpush
    <x-slot name="titlePage" class="is-primary">Best practices</x-slot>
    @if($practices->isNotEmpty())
        <label class="field is-grouped is-grouped-right is-align-items-center">
            <div>Nouveau de&nbsp;</div>
            <input id="last-updated-days" class="input is-inline" min="1" max="100" type="number" value="5">
            <div>&nbsp;Jours</div>
        </label>
        <div class="columns is-multiline">
            @foreach ($practices as $practice)
                <div class="column is-half is-flex">
                    <article class="message box-shadow">
                        <div class="message-header">{{ $practice->domain->name }}</div>
                        <div class="message-body">
                            <div>{{ $practice->description }}</div>
                            <div class="has-text-right mt-2">
                                <small>
                                    <p>
                                        <em>
                                            Modifié le
                                            <time
                                                datetime="{{ $practice->updated_at->format('Y-m-d') }}"
                                            >
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
</x-layout>
