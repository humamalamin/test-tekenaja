<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
//        abort_unless(!Auth::user()->hasRole('super administrator') || !Auth::user()->hasRole('user'), 403);

        return view('livewire.home')->layout('layouts.admin');
    }
}
