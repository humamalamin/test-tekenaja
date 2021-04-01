<?php

namespace App\View\Components\Author;

use App\Models\Author;
use Illuminate\View\Component;

class SelectAuthor extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $authors = Author::all();

        return view('components.author.select-author', compact('authors'));
    }
}
