<nav class="navbar is-fixed-top" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item" href="/">
            <img class="has-text-primary"
                 alt="Logo"
                 src="{{ url('images/logo.png') }}"
            >
        </a>

        <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbar">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>

    <div id="navbar" class="navbar-menu">
        <div class="navbar-start">
            <a class="navbar-item" href="{{ route('home') }}">
                {{ __('Home') }}
            </a>

            <div class="navbar-item has-dropdown is-hoverable" data-target="roles-dropdown">
                <a class="navbar-link">
                    Role
                </a>

                <div id="roles-dropdown" class="navbar-dropdown">
                    @foreach (\App\Models\Role::all() as $role)
                        <a class="navbar-item">
                            {{ $role->name }}
                        </a>
                    @endforeach
                </div>
            </div>

            <div class="navbar-item has-dropdown is-hoverable is-big-menu" data-target="domains-dropdown">
                <div class="navbar-link {{ str_contains(request()->path(), 'domains') ? 'has-text-link' : '' }}">
                    Domaine
                </div>
                <div class="navbar-dropdown">
                    <div class="container is-fluid">
                        <a class="navbar-item is-justify-content-center is-size-5 {{ request()->path() !== "domains" ?: 'is-active' }}"
                           href="{{  route('domains') }}"
                        >
                            Tous &mdash; {{ \App\Models\Practice::allPublished()->count() }} pratiques
                        </a>
                        <hr class="navbar-divider">
                        <div class="columns is-multiline is-flex is-justify-content-center">
                            @foreach ($domains as $domain)
                                <div class="column is-one-third is-flex">
                                    <a class="navbar-item w-full is-justify-content-center {{ request()->path() === "domains/".$domain->slug ? 'is-active' : '' }}"
                                       href="{{ route('domains.slug', ['slug' => $domain->slug]) }}"
                                    >
                                        {{ $domain->name }} &#8212; {{ $domain->practices_count }}
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <a href="{{ route('references.index') }}" class="navbar-item">
                Références
            </a>
        </div>

        <div class="navbar-end">
            <div class="navbar-item">
                @auth
                    <div class="buttons">
                        <div class="navbar-item has-dropdown is-hoverable" data-target="roles-dropdown">
                            <a class="navbar-link is-arrowless has-text-weight-bold is-uppercase has-text-primary">
                                {{ Auth::user()->name }} &hyphen; {{ Auth::user()->fullname }}
                            </a>

                            <div id="roles-dropdown" class="navbar-dropdown is-right">
                                <a class="navbar-item">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit">
                                            {{ __('Log Out') }}
                                        </button>
                                    </form>

                                </a>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="buttons">
                        <a href="{{ route('login') }}" class="button is-primary">
                            <strong>{{ __('Log in') }}</strong>
                        </a>
                        <a href="{{ route('register') }}" class="button is-primary is-outlined">
                            {{ __('Register') }}
                        </a>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</nav>
