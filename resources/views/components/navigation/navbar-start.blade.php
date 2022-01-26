<div class="navbar-start">
    <a class="navbar-item" href="{{ route('home') }}">
        {{ __('Home') }}
    </a>

    @can('access-moderator')
        <x-navigation.practices-link/>
    @endcan

    <x-navigation.domains-dropdown/>

    <x-navigation.references-link/>
</div>
