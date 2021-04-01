<?php

namespace App\Http\Livewire\Book;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Book;

class Create extends Component
{
    use WithFileUploads;

    public $title;
    public $authorId;
    public $cover;
    public $description;
    public $synopsis;
    public $publicationYear;

    public function render()
    {
        return view('livewire.book.create');
    }

    public function rules()
    {
        return [
            'title' => ['required'],
            'synopsis' => ['required', 'max:255'],
            'description' => ['required'],
            'cover' => ['required', 'mimes:jpg,png,jpeg,bmp'],
            'authorId' => ['required', 'exists:authors,id'],
            'publicationYear' => ['required', 'digits:4', 'integer', 'min:1900', 'max:'.(date('Y')+1)]
        ];
    }

    public function store()
    {
        $this->validate();

        $coverName = md5($this->cover.microtime()). '.' . $this->cover->extension();
        $coverPath = $this->cover->storeAs('books', $coverName, 'public');

        Book::create([
            'title' => $this->title,
            'cover' => $coverPath,
            'description' => $this->description,
            'synopsis' => $this->synopsis,
            'author_id' => $this->authorId,
            'publication_year' => $this->publicationYear
        ]);

        $this->emitTo('book.table', 'refresh');
        $this->dispatchBrowserEvent('closeModals');
        $this->alert('success', __('Book') . __(' created successfully!'));
        $this->reset();
    }
}
