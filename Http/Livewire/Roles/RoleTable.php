<?php

namespace Luanardev\Modules\ControlPanel\Http\Livewire\Roles;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;
use App\Models\Role;

class RoleTable extends DataTableComponent
{

	public array $perPageAccepted = [10, 20, 50, 100, 200, 500];

	public function getTableRowUrl($row): string
	{
		return route('roles.show', $row);
	}

	public function browseAction()
	{
		if(count($this->selectedKeys) > 0){
			$key = collect($this->selectedKeys)->first();
			$this->redirectRoute('roles.show', $key);
		}
	}

    public function deleteAction()
	{
		if(count($this->selectedKeys) > 0){
			Role::destroy($this->selectedKeys);
		}
	}

	public function getListeners()
    {
        return [
            'refresh' => '$refresh',
        ];
    }

	
	public function bulkActions(): array
	{
		return [
			'browseAction'	=>	'Browse',
			'deleteAction'	=>	'Delete',
		];
	}
	

	public function columns(): array
	{
		return [
			Column::make('Name'),
			Column::make('Guard Name'),
		];
	}

	public function query(): Builder
	{
		return Role::withoutAdmin()
			->when($this->getFilter('search'),
				fn ($query, $term) => $query->search($term)
        );
	}

}
