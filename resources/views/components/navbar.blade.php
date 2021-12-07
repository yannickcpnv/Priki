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
                Accueil
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

            <div class="navbar-item has-dropdown is-hoverable" data-target="domains-dropdown">
                <a class="navbar-link {{ !str_contains(request()->path(), 'domains') ?: 'has-text-link' }}">
                    Domaine
                </a>

                <div id="domains-dropdown" class="navbar-dropdown">
                    <a class="navbar-item is-danger {{ request()->path() != "domains" ?: 'is-active' }}"
                       href="{{  route('domains') }}"
                    >
                        Tous ({{ \App\Models\Practice::allPublished()->count() }})
                    </a>
                    <hr class="navbar-divider">
                    @foreach ($domains as $domain)
                        <a class="navbar-item {{ request()->path() != "domains/".$domain->slug ?: 'is-active' }}"
                           href="{{ route('domains.slug', ['slug' => $domain->slug]) }}"
                        >
                            {{ $domain->name }}
                            ({{ $domain->practices_count }})
                        </a>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="navbar-end">
            <div class="navbar-item">
                <div class="buttons">
                    <a href="{{ route('login') }}" class="button is-primary">
                        <strong>Log in</strong>
                    </a>
                    <a class="button is-primary is-outlined">
                        Sign up
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>
