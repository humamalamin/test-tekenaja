<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
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

    public $user;

    public function setTableDataClass($attribute, $value): ?string
    {
        return 'align-middle';
    }

    public function query() : Builder
    {
        return User::with(['roles:id,name'])
            ->when(!Auth::user()->hasRole('super administrator'), function ($query) {
                $query->where('name', '!=', 'super administrator');
            });
    }

    public function columns() : array
    {
        return [
            Column::make('Name', 'name')
                ->searchable()
                ->sortable(),
            Column::make('E-mail', 'email')
                ->searchable()
                ->sortable(),
            Column::make('Role', 'roles.name')
                ->searchable()
                ->sortable()
                ->format(function (User $model) {
                    return $this->html(
                      '<span class="text-uppercase">' . $model->rolesToString() . "</span>"
                    );
                }),
            Column::make('Actions')
                ->format(function(User $model) {
                    return view('components.tables.actions', [
                        'model' => $model,
                        'actions' => ['show', 'edit', 'delete']
                    ]);
                }),
        ];
    }

    public function showModal(User $user)
    {
        $this->emitTo('user.show', 'show', $user);
    }

    public function editModal(User $user)
    {
        $this->emitTo('user.update', 'edit', $user);
    }

    public function destroyConfirm(User $user)
    {
        $this->user = $user;

        $this->confirm(__('Are you sure?'), [
            'onConfirmed' => 'confirmed',
            'onCancelled' => 'cancelled'
        ]);
    }

    public function confirmed()
    {
        $this->user->delete();

        $this->alert('success', __('User') . __(' deleted successfully!'));
    }

    public function cancelled()
    {
        $this->alert('info', __('Delete canceled!'));
        $this->reset('user');
    }
}
