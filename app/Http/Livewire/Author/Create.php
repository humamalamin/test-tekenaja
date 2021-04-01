<?php

namespace App\Http\Livewire\Author;

use App\Models\Author;
use Livewire\Component;

class Create extends Component
{
    public $name;

    public function render()
    {
        return view('livewire.author.create');
    }

    public  function rules()
    {
        return [
            'name' => ['required']
        ];
    }

    public function store()
    {
        $this->validate();

        Author::create([
            'name' => $this->name
        ]);

        $this->emitTo('author.table', 'refresh');
        $this->dispatchBrowserEvent('closeModals');
        $this->alert('success', __('Author') . __(' created successfully!'));
        $this->reset();
    }
}
