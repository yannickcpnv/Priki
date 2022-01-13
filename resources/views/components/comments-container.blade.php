@props(['comments'])

<dl class="ml-3">
    @foreach ($comments as $comment)
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
