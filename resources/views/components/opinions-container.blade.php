<section class="card px-3"
         x-data="{selected: null}"
>
    <h3 class="subtitle">Opinions</h3>
    @foreach ($opinions as $opinionIndex => $opinion)
        <div x-data="{ key: {{ $opinionIndex }} }"
             @click="selected = selected !== key ? key : null"
        >
            <div class="pb-1">{{ $opinion->description }}</div>
            <div class="pb-1">Auteur : <a href="#">{{ $opinion->user->name }}</a></div>
            <div class="pb-1">Date de création : {{ $opinion->created_at->isoFormat('LL') }}</div>
            <div class="pb-1">Nombre de retours : {{ $opinion->comments()->count() }}</div>
            <div class="pb-1">+/- : {{ $opinion->comments()->sum('points') }}</div>
            <h4 class="subtitle">Commentaires</h4>
            <section class="ml-3 relative overflow-hidden transition-all max-h-0 duration-700"
                     x-ref="container"
                     x-bind:style="selected === key ? 'max-height: ' + $refs.container.scrollHeight + 'px' : ''"
            >
                @if ($opinion->comments()->count() > 0)
                    @foreach ($opinion->comments as $comment)
                        <div class="pb-1
                                @if($comment->feedback->points > 0) has-text-success
                                @elseif ($comment->feedback->points < 0) has-text-danger @endif">
                            <a href="#">{{ $comment->name }}</a> :
                            {{ $comment->feedback->comment }}, {{ $comment->feedback->points }}pts.
                        </div>
                    @endforeach
                @else
                    <p>Il n'y a pas de commentaire pour l'instant.</p>
                @endif
            </section>
        </div>
        @if ($opinionIndex !== $opinion->comments()->count() - 1)
            <div class="divider"></div>
        @endif
    @endforeach
</section>
