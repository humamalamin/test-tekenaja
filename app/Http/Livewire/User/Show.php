<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;

class Show extends Component
{
    protected $listeners = [
        'show'
    ];

    public $name;
    public $email;
    public $role;
    public $password;

    public function render()
    {
        return view('livewire.user.show');
    }

    public function show(User $user)
    {
        $this->name = $user->name;
        $this->email = $user->email;
        $this->role = $user->rolesToString();
        $this->password = $user->password;
    }
}
