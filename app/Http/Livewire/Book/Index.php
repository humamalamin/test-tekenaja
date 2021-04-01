<?php

namespace App\Http\Livewire\Book;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        abort_unless(!Auth::user()->hasRole('super administrator') || !Auth::user()->hasRole('user'), 403);

        return view('livewire.book.index')->layout('layouts.admin');
    }
}
