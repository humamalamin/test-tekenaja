<?php

namespace App\Http\Livewire\Role;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class Update extends Component
{
    protected $listeners = [
        'edit'
    ];

    public $roleId;
    public $name;

    public function render()
    {
        return view('livewire.role.update');
    }

    public function edit(Role $role)
    {
        $this->roleId = $role->id;
        $this->name = $role->name;
    }

    public function rules()
    {
        return [
            'name' => ['required']
        ];
    }

    public function update(Role $role)
    {
        $this->validate();

        $role->update([
            'name' => $this->name
        ]);

        $this->emitTo('role.table', 'refresh');
        $this->dispatchBrowserEvent('closeModals');
        $this->alert('success', __('Role') . __(' updated successfully!'));
        $this->reset();
    }
}
