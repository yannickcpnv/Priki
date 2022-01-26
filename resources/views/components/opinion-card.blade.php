@props(['opinion', 'practice'])

<div class="card anim-for-click">
    <div class="card-content">
        {{--Opinion header--}}
        <div class="media is-align-items-center">
            {{--User icon--}}
            <div class="media-left">
                <span class="icon is-medium">
                    <em class="far fa-user-circle fa-2x"></em>
                </span>
            </div>

            {{--User info--}}
            <div class="media-content">
                <p class="title is-4">
                    <a href="{{ route('users.show', $opinion->user->id) }}">{{ $opinion->user->name }}</a>
                </p>
                <p class="subtitle is-6">{{ '@'.$opinion->user->email }}</p>
            </div>

            @if (Auth::check() && $opinion->isWrittenBy(Auth::user()))
                {{--Delete opinion button--}}
                <form action="{{ route('opinions.destroy', $opinion->id) }}"
                      method="post"
                >
                    @csrf
                    @method('delete')
                    <input type="hidden" name="practice_id" value="{{ $practice->id }}">
                    <button class="delete is-medium has-background-danger anim-for-click hover:scale-125"
                            type="submit"
                            @click="confirmWithPopup('Êtes-vous sûr de vouloir supprimer cette opinion ?', $event)"
                    ></button>
                </form>
            @endif
        </div>

        <p>{{ $opinion->description }}</p>

        @if ($opinion->references->isNotEmpty() && Auth::check())
            {{--References list--}}
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

        <div class="is-flex is-justify-content-space-between">
            {{--Comments info--}}
            <p class="is-clickable"
               @click="selected = selected !== key ? key : null"
            >
                @if ($opinion->comments->isNotEmpty())
                    {{ $opinion->comments->count() }} <em class="far fa-comments"></em> -
                    <span class="has-text-success">
                        {{ $opinion->up_votes }} <em class="has-text-success far fa-thumbs-up"></em>
                    </span>
                    <span class="has-text-danger">
                        {{ $opinion->down_votes }} <em class="far fa-thumbs-down"></em>
                    </span>
                @else
                    0 <em class="far fa-comments"></em>
                @endif
            </p>

            {{--Creation date--}}
            <em>
                Crée le
                <time datetime="{{ $opinion->created_at }}">
                    {{ $opinion->created_at->isoFormat('LL') }}
                </time>
            </em>
        </div>

        <div
            class="relative overflow-hidden transition-all max-h-0 duration-700"
            x-ref="container"
            x-bind:style="key === selected ? 'max-height: ' + $refs.container.scrollHeight + 'px' : ''"
        >
            @if ($opinion->comments->count())
                <x-comments-container :comments="$opinion->comments"/>
            @endif

            {{--Create comment form--}}
            <div class="box">
                <h3 class="title is-4">Ajouter un commentaire</h3>
                @auth
                    <x-forms.comment-opinion-form
                        :practiceId="$practice->id"
                        :opinionId="$opinion->id"
                        :id="$opinion->id"
                    />
                @else
                    <x-message
                        :message="__('Login needed', ['action' => 'pouvoir commenter'])"
                        :type="'info'"
                    />
                @endauth
            </div>
        </div>
    </div>
</div>
