<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;
use Spatie\Permission\Models\Role;

class SelectRole extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $roles = Role::all();

        return view('components.forms.select-role', compact('roles'));
    }
}
