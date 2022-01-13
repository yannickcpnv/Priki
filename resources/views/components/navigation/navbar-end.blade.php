<div class="navbar-end">
    <div class="navbar-item">
        @auth
            <div class="buttons">
                <div class="navbar-item has-dropdown is-hoverable" data-target="roles-dropdown">
                    <a class="navbar-link is-arrowless has-text-weight-bold is-uppercase has-text-primary">
                        {{ Auth::user()->name }} &hyphen; {{ Auth::user()->fullname }}
                    </a>

                    <div id="roles-dropdown" class="navbar-dropdown is-right">
                        <div class="navbar-item">
                            {{ Auth::user()->role->name }}
                        </div>
                        <hr class="navbar-divider">
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
