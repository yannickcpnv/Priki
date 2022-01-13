<?php

namespace App\View\Components\Navigation;

use App\Models\Domain;
use App\Models\Practice;
use Illuminate\View\Component;

class DomainsDropdown extends Component
{

    private string $requestPath;

    public function __construct() { $this->requestPath = request()?->path(); }

    public function render()
    {
        return view('components.navigation.domains-dropdown', [
            'domains'            => Domain::allWithPracticePublishedCount(),
            'practicesPublished' => Practice::allPublished(),
            'requestPath'        => $this->requestPath,
        ]);
    }

    public function isOneOfDomainsRoute(): bool { return str_contains($this->requestPath, 'domains'); }

    public function isDomainIndexRoute(): bool { return $this->requestPath === "domains"; }

    public function isADomainRoute(Domain $domain): bool { return $this->requestPath === "domains/" . $domain->slug; }
}
