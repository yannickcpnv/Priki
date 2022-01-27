<?php

namespace App\View\Components\Navigation;

use App\Models\Domain;
use App\Models\Practice;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class DomainsDropdown extends Component
{

    private string $requestPath;

    public function __construct() { $this->requestPath = request()?->path(); }

    final public function render(): View
    {
        return view('components.navigation.domains-dropdown', [
            'domains'            => Domain::allPublishedWithCount(),
            'practicesPublished' => Practice::allPublished(),
            'requestPath'        => $this->requestPath,
        ]);
    }

    final public function isOneOfDomainsRoute(): bool { return str_contains($this->requestPath, 'domains'); }

    final public function isDomainIndexRoute(): bool { return $this->requestPath === "domains"; }

    final public function isADomainRoute(Domain $domain): bool
    {
        return $this->requestPath === "domains/" . $domain->slug;
    }
}
