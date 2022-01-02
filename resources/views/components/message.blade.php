@props(['message', 'type'])

<article class="message is-{{ $type }} box-shadow">
    <div class="message-body">
        {{ $message }}
    </div>
</article>
