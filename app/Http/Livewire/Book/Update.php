<?php

namespace App\Http\Livewire\Book;

use App\Models\Book;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    protected $listeners = [
        'edit'
    ];

    public $bookId;
    public $title;
    public $authorId;
    public $cover;
    public $description;
    public $synopsis;
    public $publicationYear;
    public $coverPreview;

    public function render()
    {
        return view('livewire.book.update');
    }

    public function edit(Book $book)
    {
        $this->bookId = $book->id;
        $this->title = $book->title;
        $this->description = $book->description;
        $this->coverPreview = $book->cover;
        $this->synopsis = $book->synopsis;
        $this->authorId = $book->author_id;
        $this->publicationYear = $book->publication_year;
    }

    public function rules()
    {
        return [
            'title' => ['required'],
            'synopsis' => ['required', 'max:255'],
            'description' => ['required'],
            'cover' => ['nullable', 'mimes:jpg,png,jpeg,bmp'],
            'authorId' => ['required', 'exists:authors,id'],
            'publicationYear' => ['required', 'digits:4', 'integer', 'min:1900', 'max:'.(date('Y')+1)]
        ];
    }

    public function update(Book $book)
    {
        $this->validate();

        if (!empty($this->cover)) {
            Storage::disk('public')->delete($book->cover);
            $coverName = md5($this->cover.microtime()). '.' . $this->cover->extension();
            $coverPath = $this->cover->storeAs('books', $coverName, 'public');
        } else {
            $coverPath = $book->cover;
        }

        $book->update([
            'title' => $this->title,
            'cover' => $coverPath,
            'description' => $this->description,
            'synopsis' => $this->synopsis,
            'author_id' => $this->authorId,
            'publication_year' => $this->publicationYear
        ]);

        $this->emitTo('book.table', 'refresh');
        $this->dispatchBrowserEvent('closeModals');
        $this->alert('success', __('Book') . __(' updated successfully!'));
        $this->reset();
    }
}
