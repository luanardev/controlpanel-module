<?php

namespace Lumis\Controlpanel\Http\Livewire\Users;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Lumis\Organization\Entities\Campus;
use Lumis\Organization\Entities\UserCampus;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class UserTable extends DataTableComponent
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

        $this->setTableRowUrl(function($row) {
            return route('users.show', $row);
        });

        $this->setBulkActions([
            'viewAction' => 'View',
            'deleteAction' => 'Delete'
        ]);
    }

    public function viewAction()
    {
        if ($this->getSelectedCount() > 0) {
            $key = collect($this->getSelected())->first();
            $this->redirectRoute('users.show', $key);
        }
    }

    public function deleteAction()
    {
        if ($this->getSelectedCount() > 0) {
            foreach ($this->getSelected() as $key) {
                $user = User::find($key);
                if (!$user->isAdmin()) {
                    $user->delete();
                }
            }
        }
    }

    public function columns(): array
    {
        return [
            Column::make('Name'),
            Column::make('Email'),
            Column::make('Campus')->label(function($row, Column $column){
				if(isset($row)){
					$campus = UserCampus::get($row->id);
					return $campus?->name;
				}else{
					return null;
				}
                
            }),
            Column::make('Status'),
            Column::make('ID', 'id'),
        ];
    }

    public function builder(): Builder
    {
        $campus = Campus::getUserCampus();
        return User::query()
			->when($campus, 
				fn(Builder $query, $value) => $query->where('campus_id', $campus->id)
			)
            ->when($this->getSearch(),
                fn(Builder $query, $value) => $query->search($value)
            );
    }

    protected function getListeners(): array
    {
        return[
            'refresh' => '$refresh'
        ];
    }

}
