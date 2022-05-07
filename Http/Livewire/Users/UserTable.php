<?php

namespace Luanardev\Modules\ControlPanel\Http\Livewire\Users;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;
use App\Models\User;

class UserTable extends DataTableComponent
{

	public array $perPageAccepted = [10, 20, 50, 100, 200, 500];

	public function getTableRowUrl($row): string
	{
		return route('users.show', $row);
	}

	public function browseAction()
	{
		if(count($this->selectedKeys) > 0){
			$key = collect($this->selectedKeys)->first();
			$this->redirectRoute('users.show', $key);
		}
	}

    public function deleteAction()
	{
		if(count($this->selectedKeys) > 0){
			User::destroy($this->selectedKeys);
		}
	}

	public function rowView(): string
	{
		return 'controlpanel::livewire.users.table-row';
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
			Column::make('ID'),
			Column::make('Name'),
			Column::make('Email'),
			Column::make('Campus'),
			Column::make('Role'),
			Column::make('Status'),
		];
	}

	public function query(): Builder
	{
		return User::withoutAdmin()
			->when($this->getFilter('search'),
				fn ($query, $term) => $query->search($term)
        );
	}

}
