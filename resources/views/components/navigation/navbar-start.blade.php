<div class="navbar-start">
    <a class="navbar-item" href="{{ route('home') }}">
        {{ __('Home') }}
    </a>

    <x-navigation.roles-dropdown/>

    <x-navigation.domains-dropdown/>

    <x-navigation.references-link/>
</div>
