<?php

namespace App\Http\Livewire\User;

use App\Http\Middleware\PreventRequestsDuringMaintenance;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Update extends Component
{
    protected $listeners = [
        'edit'
    ];

    public $userId;
    public $name;
    public $email;
    public $roleId;
    public $password;

    public function render()
    {
        return view('livewire.user.update');
    }

    public function edit(User $user)
    {
        $this->userId = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->roleId = $user->firstRole()->id;
    }

    public function rules()
    {
        return [
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['nullable', 'min:6'],
            'roleId' => ['required', 'exists:roles,id']
        ];
    }

    public function update(User $user)
    {
        $this->validate();

        if (!empty($this->password)) {
            $password = Hash::make($this->password);
        } else {
            $password = $user->password;
        }

        $user->update([
            'name' => $this->name,
            'password' => $password,
            'email' => $this->email,
            'email_verified_at' => now()
        ]);

        $user->syncRoles($this->roleId);

        $this->emitTo('user.table', 'refresh');
        $this->dispatchBrowserEvent('closeModals');
        $this->alert('success', __('User') . __(' updated successfully!'));
        $this->reset();
    }
}
