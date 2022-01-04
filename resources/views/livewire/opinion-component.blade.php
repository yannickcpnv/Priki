<div x-data="{ key: {{ $opinion->id }} }"
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
            @if (Auth::check() && $opinion->isWrittenBy(Auth::user()))
                <form action="{{ route('opinions.destroy', $opinion->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <input type="hidden" name="practice_id" value="{{ $practice->id }}">
                    <button class="delete is-medium has-background-danger anim-for-click hover:scale-125"
                            type="submit"
                    ></button>
                </form>
            @endif
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

        @if ($opinion->commentators()->count())
            <span>
                <em class="far fa-star"></em> : {{ $opinion->all_points }} points
            </span>
            <br>
            <span class="is-clickable"
                  @click="selected = selected !== key ? key : null"
            >
                {{ $opinion->commentators()->count() }} <em class="far fa-comments"></em>
            </span>
            &mdash;
            @auth()
                <span class="has-text-success is-clickable"
                      wire:click="voteUp()"
                >
                    {{ $opinion->up_votes }} <em class="has-text-success far fa-thumbs-up"></em>
                </span>
                <span class="has-text-danger is-clickable"
                      wire:click="voteDown()"
                >
                    {{ $opinion->down_votes }} <em class="far fa-thumbs-down"></em>
                </span>
            @else
                <span class="has-text-success is-clickable">
                    {{ $opinion->up_votes }} <em class="has-text-success far fa-thumbs-up"></em>
                </span>
                <span class="has-text-danger is-clickable"
                >
                    {{ $opinion->down_votes }} <em class="far fa-thumbs-down"></em>
                </span>
            @endauth
        @else
            <span class="is-clickable"
                  @click="selected = selected !== key ? key : null"
            >
                0 <em class="far fa-comments"></em>
            </span>
        @endif

        <div
            class="relative overflow-hidden transition-all max-h-0 duration-700"
            x-ref="container"
            x-bind:style="key === selected ? 'max-height: ' + $refs.container.scrollHeight + 'px' : ''"
        >
            @if ($opinion->commentators()->count() > 0)
                <x-comments-container :commentators="$opinion->commentators"/>
            @endif

            <div class="box">
                <h3 class="title is-4">Ajouter un commentaire</h3>
                @auth
                    <x-forms.comment-opinion-form
                        :practiceId="$practice->id"
                        :opinionId="$opinion->id"
                        :index="$opinion->id"
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
