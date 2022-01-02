@props(['opinions', 'practice'])

<section class="box content" x-data="{selected: null}">
    <h2 class="subtitle is-3">Opinions</h2>
    @foreach ($opinions as $opinionIndex => $opinion)
        <div x-data="{ key: {{ $opinionIndex }}, clickInForm: false }"
             @click="if(!clickInForm) selected = selected !== key ? key : null; clickInForm = false;"
            @class(['block card', 'is-clickable anim-for-click'])
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
                    <p>
                        {{ $opinion->comments()->count() }} <em class="far fa-comments"></em> -
                        <span class="has-text-success">
                            {{ $opinion->upVotes() }} <em class="far fa-thumbs-up"></em>
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
                        <dl class="ml-3">
                            @foreach ($opinion->comments as $comment)
                                <dt><a href="#">{{ $comment->name }}</a></dt>
                                <dd>
                                    {{ $comment->feedback->comment }}
                                    <span @class([
                                              'has-text-success' => $comment->feedback->points > 0,
                                              'has-text-danger' => $comment->feedback->points < 0
                                          ])
                                    >
                                        @if ($comment->feedback->points > 0)
                                            <em class="far fa-thumbs-up"></em>
                                        @elseif ($comment->feedback->points < 0)
                                            <em class="far fa-thumbs-down"></em>
                                        @else
                                            <em class="far fa-meh"></em>
                                        @endif
                                    </span>
                                </dd>
                            @endforeach
                        </dl>
                    @endif

                    <div @click="clickInForm = true"
                         class="box">
                        <h3 class="title is-4">Ajouter un commentaire</h3>
                        @auth
                            <form method="post" action="{{ route('opinions.comment.store') }}">
                                @csrf

                                <input type="hidden" name="practice_id" value="{{ $practice->id }}">
                                <input type="hidden" name="opinion_id" value="{{ $opinion->id }}">

                                <div class="field">
                                    <label class="label" for="comment[{{ $opinionIndex }}]">Commentaire</label>
                                    <div class="control">
                                        <textarea class="textarea"
                                                  id="comment[{{ $opinionIndex }}]"
                                                  name="comment"
                                                  minlength="10"
                                                  maxlength="5000"
                                                  required
                                        ></textarea>
                                    </div>
                                    <p class="help">
                                        Le texte doit être compris entre 10 et 5000 caractères.
                                    </p>
                                </div>

                                <div class="field">
                                    <label class="label" for="points[{{ $opinionIndex }}]">Positif/Négatif</label>
                                    <div class="control">
                                        <div class="select">
                                            <select id="points[{{ $opinionIndex }}]" name="points">
                                                <option value="0">Neutre</option>
                                                <option value="1">Positif</option>
                                                <option value="-1">Négatif</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="field">
                                    <div class="control has-text-right">
                                        <input type="submit" class="button is-success" value="Ajouter le commentaire">
                                    </div>
                                </div>
                            </form>
                        @else
                            <div class="notification is-info is-light">
                                Vous devez être connecté pour poster un commentaire.
                            </div>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</section>
