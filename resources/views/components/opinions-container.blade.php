<section class="card px-3"
         x-data="{selected: null}"
>
    <h3 class="subtitle">Opinions</h3>
    @foreach ($opinions as $opinionIndex => $opinion)
        <div x-data="{ key: {{ $opinionIndex }} }"
             @click="selected = selected !== key ? key : null"
        >
            <div>{{ $opinion->description }}</div>
            <div>Auteur : <a href="#">{{ $opinion->user->name }}</a></div>
            <div>Date de création : {{ $opinion->created_at->isoFormat('LL') }}</div>
            <div>Nombre de retours : {{ $opinion->comments()->count() }}</div>
            <div>+/- : {{ $opinion->comments()->sum('points') }}</div>
            @if ($opinion->comments()->count() > 0)
                <section class="ml-3 relative overflow-hidden transition-all max-h-0 duration-700"
                         x-ref="container"
                         x-bind:style="selected === key ? 'max-height: ' + $refs.container.scrollHeight + 'px' : ''"
                >
                    <h4 class="subtitle">Commentaires</h4>
                    @foreach ($opinion->comments as $comment)
                        <div>
                            <a href="#">{{ $comment->name }}</a> :
                            {{ $comment->feedback->comment }}, {{ $comment->feedback->points }}pts.
                        </div>
                    @endforeach
                </section>
            @endif
        </div>
        @if ($opinionIndex !== $opinion->comments()->count() - 1)
            <div class="divider"></div>
        @endif
    @endforeach
</section>
