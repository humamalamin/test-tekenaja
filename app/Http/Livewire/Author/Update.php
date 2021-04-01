<?php

namespace App\Http\Livewire\Author;

use App\Models\Author;
use Livewire\Component;

class Update extends Component
{
    protected $listeners = [
        'edit'
    ];

    public $authorId;
    public $name;

    public function render()
    {
        return view('livewire.author.update');
    }

    public function edit(Author $author)
    {
        $this->authorId = $author->id;
        $this->name = $author->name;
    }

    public function rules()
    {
        return [
            'name' => ['required']
        ];
    }

    public function update(Author $author)
    {
        $this->validate();

        $author->update(['name' => $this->name]);

        $this->emitTo('author.table', 'refresh');
        $this->dispatchBrowserEvent('closeModals');
        $this->alert('success', __('Author') . __(' updated successfully!'));
        $this->reset();
    }
}
