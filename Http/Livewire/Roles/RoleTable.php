<?php

namespace Lumis\Controlpanel\Http\Livewire\Roles;

use App\Models\Role;
use Illuminate\Database\Eloquent\Builder;
use League\CommonMark\Extension\CommonMark\Node\Inline\Link;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;

class RoleTable extends DataTableComponent
{

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setPageName('page');
        $this->setPerPageAccepted([10, 25, 50, 100]);
        $this->setSearchEnabled();
        $this->setPaginationEnabled();
        $this->setBulkActionsEnabled();
        $this->setColumnSelectDisabled();
        $this->setBulkActions([
            'viewAction' => 'View',
            'editAction' => 'Edit',
            'deleteAction' => 'Delete'
        ]);
    }

    public function editAction()
    {
        if ($this->getSelectedCount() > 0) {
            $key = collect($this->getSelected())->first();
            $this->redirectRoute('roles.edit', $key);
        }
    }

    public function deleteAction()
    {
        if ($this->getSelectedCount() > 0) {
            foreach ($this->getSelected() as $key) {
                $role = Role::find($key);
                if (!$role->isAdmin()) {
                    $role->delete();
                }
            }
        }
    }

    public function viewAction()
    {
        if ($this->getSelectedCount() > 0) {
            $key = collect($this->getSelected())->first();
            $this->redirectRoute('roles.show', $key);
        }
    }

    public function columns(): array
    {
        return [
            Column::make('Name'),
            Column::make('Guard Name'),
            Column::make('ID', 'id'),
            ButtonGroupColumn::make('Action')->buttons([

                LinkColumn::make('View')
                    ->title(fn($row) => 'View')
                    ->location(fn($row) => route('roles.show', $row))
                    ->attributes(fn($row) => ['class' => 'p-lg-1'] ),

                LinkColumn::make('Edit')
                    ->title(fn($row) => 'Edit')
                    ->location(fn($row) => route('roles.edit', $row))
                    ->attributes(fn($row) => ['class' => 'p-lg-1'] ),

                LinkColumn::make('Delete')
                    ->title(fn($row) => 'Delete')
                    ->location(fn($row) => route('roles.delete', $row))
                    ->attributes(fn($row) => ['class' => 'p-lg-1'] )
            ])
        ];
    }

    public function builder(): Builder
    {
        return Role::withoutAdmin()
            ->when($this->getSearch(),
                fn(Builder $query, $value) => $query->search($value)
            );
    }

}
