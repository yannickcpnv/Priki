<nav class="navbar is-light" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item" href="/">
            <img class="has-text-primary"
                 alt="Logo"
                 src="https://www.seekpng.com/png/full/596-5962820_best-practice-logo-pediatric-nutrition-in-practice.png"
            >
        </a>

        <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>

    <div id="navbarBasicExample" class="navbar-menu">
        <div class="navbar-start">
            <a class="navbar-item">
                Home
            </a>

            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link">
                    Roles
                </a>

                <div class="navbar-dropdown">
                    @foreach (\App\Models\Role::all() as $role)
                        <a class="navbar-item">
                            {{ $role->name }}
                        </a>
                    @endforeach
                </div>
            </div>

            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link">
                    Domain
                </a>

                <div class="navbar-dropdown">
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
