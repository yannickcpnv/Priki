<?php

namespace App\View\Components\Navigation;

use App\Models\Role;
use Illuminate\View\Component;

class RolesDropdown extends Component
{

    public function render()
    {
        return view('components.navigation.roles-dropdown', [
            'roles' => Role::all(),
        ]);
    }
}
