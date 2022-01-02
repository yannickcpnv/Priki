<article
    class="notification {{ $getTypeClass }}"
    x-data="{ show: true }"
    x-show="show"
    x-transition:leave="anim-leave"
    x-transition:leave-start="anim-leave-start"
    x-transition:leave-end="anim-leave-end"
>
    <button class="delete" @click="show = false"></button>
    {{ $message }}
</article>
