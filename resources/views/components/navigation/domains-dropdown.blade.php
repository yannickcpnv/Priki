<div class="navbar-item has-dropdown is-hoverable" data-target="domains-dropdown">
    <a @class(['navbar-link', 'has-text-link' => $isOneOfDomainsRoute()])>
        Domaine
    </a>

    <div id="domains-dropdown" class="navbar-dropdown">
        <a @class(['navbar-item', 'is-danger', 'is-active' => $isDomainIndexRoute()])
           href="{{ route('domains') }}"
        >
            Tous ({{ $practicesPublished->count() }})
        </a>
        <hr class="navbar-divider">
        @foreach ($domains as $domain)
            <a @class(['navbar-item', 'is-active' => $isADomainRoute($domain)])
               href="{{ route('domains.slug', ['slug' => $domain->slug]) }}"
            >
                {{ $domain->name }}
                ({{ $domain->practices_count }})
            </a>
        @endforeach
    </div>
</div>
