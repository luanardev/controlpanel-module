<?php

namespace Lumis\Controlpanel\Http\Livewire\Roles;

use App\Models\App;
use App\Models\Role;
use Luanardev\LivewireUI\LivewireUI;

class CreateRole extends LivewireUI
{
    public Role $role;

    public $selectApp;

    public $selectedApp;

    public $selectPermissions;

    public $selectedPermissions = array();

    public $savedPermissions = array();

    public $savedApps = array();


    public function mount()
    {
        $this->role = new Role();
    }

    public function updatedSelectModule($value)
    {
        if ($value) {
            $this->selectedApp = App::find($value);
        }
    }

    public function updatedSelectPermissions($value)
    {
        if ($value) {
            $this->selectedPermissions = $this->selectedApp->permissions()->pluck('id')->toArray();
        } else {
            $this->selectedPermissions = [];
        }
    }

    public function savePermissions()
    {
        if (count($this->selectedPermissions)) {

            $appName = $this->selectedApp->display_name;

            if (!in_array($appName, $this->savedApps)) {

                $this->savedApps[] = $appName;
                $this->savedPermissions[$appName][] = $this->selectedPermissions;

                $this->selectApp = null;
                $this->selectedApp = null;

                $this->selectPermissions = null;
                $this->selectedPermissions = [];
            } else {
                $this->toastrError("{$appName} already added");
            }

        } else {
            $this->toastrError("No permissions selected");
        }

    }

    public function deletePermissions($appName)
    {
        $appIndex = array_search($appName, $this->savedApps);
        $permissionIndex = array_search($appName, $this->savedPermissions);
        unset($this->savedApps[$appIndex]);
        unset($this->savedPermissions[$permissionIndex]);
    }

    public function save()
    {
        $this->validate();
        $permissions = array_values($this->savedPermissions);
        $this->role->syncPermissions($permissions);
        $this->role->save();

        $this->alert("Role created successfully");
        $this->redirect(route('roles.index'));
    }

    public function rules()
    {
        return [
            'role.name' => 'required|string',
            'savedPermissions' => 'required|array',
        ];
    }

    public function render()
    {
        $this->viewData();
        return view('controlpanel::livewire.roles.create-role');
    }

    public function viewData()
    {
        $apps = App::all();
        $this->with('apps', $apps);
    }

}
