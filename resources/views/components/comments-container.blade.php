@props(['commentators'])

<dl class="ml-3">
    @foreach ($commentators as $commentator)
        <dt><a href="#">{{ $commentator->name }}</a></dt>
        <dd>
            {{ $commentator->feedback->comment }}
            <span @class([
                      'has-text-success' => $commentator->feedback->points > 0,
                      'has-text-danger' => $commentator->feedback->points < 0
                  ])
            >
                @if ($commentator->feedback->points > 0)
                    <em class="far fa-thumbs-up"></em>
                @elseif ($commentator->feedback->points < 0)
                    <em class="far fa-thumbs-down"></em>
                @else
                    <em class="far fa-meh"></em>
                @endif
            </span>
        </dd>
    @endforeach
</dl>
