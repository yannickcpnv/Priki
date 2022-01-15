@props(['opinions', 'practice'])
@push('custom-scripts')
    <script src="{{ mix('js/confirm.js') }}"></script>
@endpush

<section class="box content" x-data="{selected: null}">
    <h2 class="subtitle is-3">Opinions</h2>
    @if ($practice->opinions->isNotEmpty())
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
                        @if (Auth::check() && $opinion->isWrittenBy(Auth::user()))
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
                    @if ($opinion->references->isNotEmpty())
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

                    <div
                        class="relative overflow-hidden transition-all max-h-0 duration-700"
                        x-ref="container"
                        x-bind:style="key === selected ? 'max-height: ' + $refs.container.scrollHeight + 'px' : ''"
                    >
                        @if ($opinion->comments->count())
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
                                    :message="__('Login needed', ['action' => 'pouvoir commenter'])"
                                    :type="'info'"
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
        @if (Auth::user()->hasGivenOpinionTo($practice))
            <x-message :message="'Vous avez déjà donné votre opinion pour cette practice.'" :type="'info'"/>
        @else
            <x-forms.opinion-form :practiceId="$practice->id"/>
        @endif
    @else
        <x-message :message="__('Login needed', ['action' => 'donner votre opinion'])"
                   :type="'info'"
        />
    @endauth
</section>
