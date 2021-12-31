<?php

namespace App\View\Components;

use App\Models\Role;
use App\Models\Domain;
use App\Models\Practice;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Navbar extends Component
{

    private string $requestPath;

    public function __construct()
    {
        $this->requestPath = request()?->path();
    }

    public function render(): View
    {
        return view('components.navbar', [
            'domains'            => Domain::allWithPracticePublishedCount(),
            'roles'              => Role::all(),
            'practicesPublished' => Practice::allPublished(),
        ]);
    }

    public function isOneOfDomainsRoute(): bool { return str_contains($this->requestPath, 'domains'); }

    public function isDomainIndexRoute(): bool { return $this->requestPath === "domains"; }

    public function isADomainRoute(Domain $domain): bool { return $this->requestPath === "domains/" . $domain->slug; }

    public function isAReferenceRoute(): bool { return str_contains($this->requestPath, 'references'); }
}
