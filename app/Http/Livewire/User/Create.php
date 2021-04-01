<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Create extends Component
{
    public $name;
    public $email;
    public $roleId;
    public $password;

    public function render()
    {
        return view('livewire.user.create');
    }

    public function rules()
    {
        return [
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:6'],
            'roleId' => ['required', 'exists:roles,id']
        ];
    }

    public function store()
    {
        $this->validate();

        User::create([
            'name' => $this->name,
            'password' => Hash::make($this->password),
            'email' => $this->email,
            'email_verified_at' => now()
        ])->assignRole($this->roleId);

        $this->emitTo('user.table', 'refresh');
        $this->dispatchBrowserEvent('closeModals');
        $this->alert('success', __('User') . __(' created successfully!'));
        $this->reset();
    }
}
