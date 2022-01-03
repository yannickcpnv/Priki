@props(['opinions', 'practice'])

<section class="box content" x-data="{selected: null}">
    <h2 class="subtitle is-3">Opinions</h2>
    @if ($practice->opinions->count())
        @foreach ($opinions as $opinionIndex => $opinion)
            <div x-data="{ key: {{ $opinionIndex }} }"
                 class="block card anim-for-click"
            >
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

                    <p>{{ $opinion->description }}</p>
                    @if ($opinion->references->count())
                        <dl>
                            <dt class="subtitle is-5">Références</dt>
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

                    @if ($opinion->comments()->count())
                        <p class="is-clickable"
                           @click="selected = selected !== key ? key : null"
                        >
                            {{ $opinion->comments()->count() }} <em class="far fa-comments"></em> -
                            <span class="has-text-success">
                                {{ $opinion->upVotes() }} <em class="has-text-success far fa-thumbs-up"></em>
                            </span>
                            <span class="has-text-danger">
                                {{ $opinion->downVotes() }} <em class="far fa-thumbs-down"></em>
                            </span>
                        </p>
                    @else
                        <p>0 <em class="far fa-comments"></em></p>
                    @endif

                    <div
                        class="relative overflow-hidden transition-all max-h-0 duration-700"
                        x-ref="container"
                        x-bind:style="key === selected ? 'max-height: ' + $refs.container.scrollHeight + 'px' : ''"
                    >
                        @if ($opinion->comments()->count() > 0)
                            <x-comments-container :comments="$opinion->comments"/>
                        @endif

                        <div class="box">
                            <h3 class="title is-4">Ajouter un commentaire</h3>
                            @auth
                                <x-forms.comment-opinion-form
                                    :practiceId="$practice->id"
                                    :opinionId="$opinion->id"
                                    :index="$opinionIndex"
                                />
                            @else
                                <x-message
                                    :message="'Vous devez être connecté pour poster un commentaire.'"
                                    :type="'warning'"
                                />
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <x-message :message="'Il n\'y pas encore d\'opinions.'" :type="'info'"/>
    @endif

    <h3 class="title is-4">Ajouter une opinion</h3>
    @auth
        <x-forms.opinion-form :practiceId="$practice->id"/>
    @else
        <x-message :message="'Vous devez être connecté pour poster une opinion.'" :type="'warning'"/>
    @endauth
</section>
