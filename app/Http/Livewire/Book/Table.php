<?php

namespace App\Http\Livewire\Book;

use App\Models\Book;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\TableComponent;
use Rappasoft\LaravelLivewireTables\Traits\HtmlComponents;
use Rappasoft\LaravelLivewireTables\Views\Column;

class Table extends TableComponent
{
    use HtmlComponents;

    protected $listeners = [
        'refresh' => '$refresh',
        'confirmed',
        'cancelled',
    ];

    protected $options = [
        'bootstrap.classes.table' => 'table table-hover',
    ];

    public $sortDirection = 'desc';
    public $permission;
    public $perPage = 10;

    public $book;

    public function setTableDataClass($attribute, $value): ?string
    {
        return 'align-middle';
    }

    public function query() : Builder
    {
        return Book::with(['author']);
    }

    public function columns() : array
    {
        return [
            Column::make('Title', 'title')
                ->searchable()
                ->sortable(),
            Column::make('Author', 'author.name')
                ->searchable()
                ->sortable(),
            Column::make('Synopsis', 'synopsis')
                ->searchable()
                ->sortable(),
            Column::make('Publication Year', 'publication_year')
                ->searchable()
                ->sortable(),
            Column::make('Actions')
                ->format(function(Book $model) {
                    return view('components.tables.actions', [
                        'model' => $model,
                        'actions' => ['show', 'edit', 'delete']
                    ]);
                }),
        ];
    }

    public function showModal(Book $book)
    {
        $this->emitTo('book.show', 'show', $book);
    }

    public function editModal(Book $book)
    {
        $this->emitTo('book.update', 'edit', $book);
    }

    public function destroyConfirm(Book $book)
    {
        $this->book = $book;

        $this->confirm(__('Are you sure?'), [
            'onConfirmed' => 'confirmed',
            'onCancelled' => 'cancelled'
        ]);
    }

    public function confirmed()
    {
        $this->book->delete();

        $this->alert('success', __('Book') . __(' deleted successfully!'));
    }

    public function cancelled()
    {
        $this->alert('info', __('Delete canceled!'));
        $this->reset('book');
    }
}
