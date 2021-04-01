<?php

namespace App\Http\Livewire\Role;

use Spatie\Permission\Models\Role;
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

    public $role;

    public function setTableDataClass($attribute, $value): ?string
    {
        return 'align-middle';
    }

    public function query() : Builder
    {
        return Role::query();
    }

    public function columns() : array
    {
        return [
            Column::make('Name', 'name')
                ->searchable()
                ->sortable(),
            Column::make('Actions')
                ->format(function(Role $model) {
                    return view('components.tables.actions', [
                        'model' => $model,
                        'actions' => ['show', 'edit', 'delete']
                    ]);
                }),
        ];
    }

    public function showModal(Role $role)
    {
        $this->emitTo('role.show', 'show', $role);
    }

    public function editModal(Role $role)
    {
        $this->emitTo('role.update', 'edit', $role);
    }

    public function destroyConfirm(Role $role)
    {
        $this->role = $role;

        $this->confirm(__('Are you sure?'), [
            'onConfirmed' => 'confirmed',
            'onCancelled' => 'cancelled'
        ]);
    }

    public function confirmed()
    {
        $this->role->delete();

        $this->alert('success', __('Role') . __(' deleted successfully!'));
    }

    public function cancelled()
    {
        $this->alert('info', __('Delete canceled!'));
        $this->reset('role');
    }
}
