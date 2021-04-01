<?php

namespace App\Http\Livewire\Role;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class Create extends Component
{
    public $name;

    public function render()
    {
        return view('livewire.role.create');
    }

    public function rules()
    {
        return [
            'name' => ['required']
        ];
    }

    public function store()
    {
        $this->validate();

        Role::create([
            'name' => $this->name,
            'guard_name' => 'web'
        ]);

        $this->emitTo('role.table', 'refresh');
        $this->dispatchBrowserEvent('closeModals');
        $this->alert('success', __('Role') . __(' created successfully!'));
        $this->reset();
    }
}
