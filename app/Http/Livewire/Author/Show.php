<?php

namespace App\Http\Livewire\Author;

use App\Models\Author;
use Livewire\Component;

class Show extends Component
{
    protected $listeners = [
        'show'
    ];

    public $name;

    public function render()
    {
        return view('livewire.author.show');
    }

    public function show(Author $author)
    {
        $this->name = $author->name;
    }
}
