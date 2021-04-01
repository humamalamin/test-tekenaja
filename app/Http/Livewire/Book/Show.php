<?php

namespace App\Http\Livewire\Book;

use App\Models\Book;
use Livewire\Component;

class Show extends Component
{
    public $listeners = [
        'show'
    ];

    public $bookId;
    public $title;
    public $author;
    public $cover;
    public $description;
    public $synopsis;
    public $publicationYear;

    public function render()
    {
        return view('livewire.book.show');
    }

    public function show(Book $book)
    {
        $this->bookId = $book->id;
        $this->title = $book->title;
        $this->description = $book->description;
        $this->cover = $book->cover;
        $this->synopsis = $book->synopsis;
        $this->author = $book->author->name;
        $this->publicationYear = $book->publication_year;
    }
}
