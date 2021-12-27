<section class="columns is-desktop is-multiline"
         x-data="{selected: null}"
>
    @foreach ($opinions as $opinionIndex => $opinion)
        <div class="column"
             x-data="{ key: {{ $opinionIndex }} }"
             @click="selected = selected !== key ? key : null"
        >
            <div class="card is-clickable anim-for-click">
                <div class="card-content">
                    <div class="media is-align-items-center">
                        <div class="media-left">
                            <span class="icon is-medium">
                                <em class="far fa-user-circle fa-2x"></em>
                            </span>
                        </div>
                        <div class="media-content">
                            <p class="title is-4"><a href="#">{{ $opinion->user->name }}</a></p>
                            <p class="subtitle is-6">{{ '@'.$opinion->user->email }}</p>
                        </div>
                    </div>

                    <div class="content">
                        <p>{{ $opinion->description }}</p>
                        @if ($opinion->references->count())
                            <dl>
                                <dt>Références</dt>
                                @foreach($opinion->references as $reference)
                                    <dd>
                                        @if ($reference->url)
                                            <a href="{{ $reference->url }}" target="_blank">
                                                {{ $reference->description }}
                                            </a>
                                        @else
                                            {{ $reference->description }}
                                        @endif
                                    </dd>
                                @endforeach
                            </dl>
                        @endif
                        <div class="has-text-right">
                            <em>
                                Crée le
                                <time datetime="{{ $opinion->created_at }}">
                                    {{ $opinion->created_at->isoFormat('LL') }}
                                </time>
                            </em>
                        </div>

                        @if ($opinion->comments()->count() > 0)
                            <p>Commentaires</p>
                            <dl class="ml-3 relative overflow-hidden transition-all max-h-0 duration-700"
                                x-ref="container"
                                x-bind:style="selected === key ? 'max-height: ' + $refs.container.scrollHeight + 'px' : ''">
                                @foreach ($opinion->comments as $comment)
                                    <dt><a href="#">{{ $comment->name }}</a></dt>
                                    <dd>
                                        {{ $comment->feedback->comment }},
                                        <span class="@if($comment->feedback->points > 0) has-text-success
                                                     @elseif ($comment->feedback->points < 0) has-text-danger @endif"
                                        >
                                            {{ $comment->feedback->points }}pts.
                                        </span>
                                    </dd>
                                @endforeach
                            </dl>
                        @else
                            <p>Il n'y a pas de commentaire pour l'instant.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</section>
