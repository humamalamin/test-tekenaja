<?php

namespace App\Http\Livewire\Role;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class Show extends Component
{
    protected $listeners = [
        'show'
    ];

    public $name;
    public $guard;

    public function render()
    {
        return view('livewire.role.show');
    }

    public function show(Role $role)
    {
        $this->name = $role->name;
        $this->guard = $role->guard_name;
    }
}
