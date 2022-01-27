<?php

namespace App\View\Components\Navigation;

use App\Models\Role;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class RolesDropdown extends Component
{

    final public function render(): View
    {
        return view('components.navigation.roles-dropdown', [
            'roles' => Role::all(),
        ]);
    }
}
