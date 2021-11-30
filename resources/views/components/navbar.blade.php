<nav class="navbar is-light" role="navigation" aria-label="main navigation">
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
            <a class="navbar-item">
                Home
            </a>

            <div class="navbar-item has-dropdown is-hoverable" data-target="roles-dropdown"
            >
                <a class="navbar-link">
                    Roles
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
                <a class="navbar-link">
                    Domains
                </a>

                <div id="domains-dropdown" class="navbar-dropdown">
                    @foreach (\App\Models\Domain::all() as $domain)
                        <a class="navbar-item">
                            {{ $domain->name }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="navbar-end">
            <div class="navbar-item">
                <div class="buttons">
                    <a class="button is-primary">
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
