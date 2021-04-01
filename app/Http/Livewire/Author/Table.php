<?php

namespace App\Http\Livewire\Author;

use App\Models\Author;
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

    public $author;

    public function setTableDataClass($attribute, $value): ?string
    {
        return 'align-middle';
    }

    public function query() : Builder
    {
        return Author::query();
    }

    public function columns() : array
    {
        return [
            Column::make('Name', 'name')
                ->searchable()
                ->sortable(),
            Column::make('Actions')
                ->format(function(Author $model) {
                    return view('components.tables.actions', [
                        'model' => $model,
                        'actions' => ['show', 'edit', 'delete']
                    ]);
                }),
        ];
    }

    public function showModal(Author $author)
    {
        $this->emitTo('author.show', 'show', $author);
    }

    public function editModal(Author $author)
    {
        $this->emitTo('author.update', 'edit', $author);
    }

    public function destroyConfirm(Author $author)
    {
        $this->author = $author;

        $this->confirm(__('Are you sure?'), [
            'onConfirmed' => 'confirmed',
            'onCancelled' => 'cancelled'
        ]);
    }

    public function confirmed()
    {
        $this->author->delete();

        $this->alert('success', __('Author') . __(' deleted successfully!'));
    }

    public function cancelled()
    {
        $this->alert('info', __('Delete canceled!'));
        $this->reset('author');
    }
}
