<article class="border-4 my-2">
    <div>Description : {{ $this->opinion->description }}</div>
    <div>Auteur : {{ $this->opinion->user->name }}</div>
    <div>Date de création : {{ $this->opinion->created_at->isoFormat('LL') }}</div>
    <div>Nombre de retours : {{ $this->opinion->users()->count() }}</div>
    <div>+ : / - : {{ $this->opinion->users()->sum('points') }}</div>
</article>
