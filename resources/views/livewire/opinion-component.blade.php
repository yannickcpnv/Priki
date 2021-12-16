<article class="border-4 my-2">
    <div>Description : {{ $this->opinion->description }}</div>
    <div>Auteur : {{ $this->opinion->user->name }}</div>
    <div>Date de création : {{ $this->opinion->created_at->isoFormat('LL') }}</div>
</article>
