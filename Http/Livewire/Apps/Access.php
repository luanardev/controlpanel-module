<?php

namespace Lumis\Controlpanel\Http\Livewire\Apps;

use App\Models\App;
use App\Models\Role;
use Luanardev\LivewireUI\LivewireUI;

class Access extends LivewireUI
{
    public App $app;

    public Role $role;

    public $selectRole;

    public $permissions = array();

    public $selectAll = false;

    public $updateAll = false;

    public function mount(App $app)
    {
        $this->app = $app;
        $this->permissions = collect();
    }

    public function create()
    {
        $this->createMode();
    }

    public function show()
    {
        $this->cancel();
        $this->browseMode();
    }

    public function cancel()
    {
        $this->reset(['selectRole', 'permissions']);
    }

    public function edit($id = null)
    {
        $this->updateAll = true;
        $this->role = Role::findorfail($id);
        $this->permissions = $this->role->permissions()->pluck('id')->toArray();
        $this->editMode();
    }

    public function store()
    {
        $this->role = Role::findorfail($this->selectRole);

        $this->addPermissions($this->permissions);

        $this->reset(['selectRole', 'permissions']);

        $this->selectAll = false;

        $this->emitRefresh()->browseMode()->toastr('Role ACL created');
    }

    private function addPermissions($permissions)
    {
        foreach ($permissions as $permission) {
            $this->role->givePermissionTo($permission);
        }
    }

    public function update()
    {
        $currentPermissions = $this->getRolePermissions();

        $this->removePermissions($currentPermissions);

        $this->addPermissions($this->permissions);

        $this->updateAll = false;
        $this->emitRefresh()->browseMode()->toastr('Role ACL updated');
    }

    private function getRolePermissions()
    {
        return $this->role
            ->permissions()
            ->where('app_id', $this->app->id)
            ->get();
    }

    private function removePermissions($permissions)
    {
        foreach ($permissions as $permission) {
            $this->role->revokePermissionTo($permission);
        }
    }

    public function updatedSelectAll($value)
    {
        if ($value) {
            $this->permissions = $this->app->permissions()->pluck('id')->toArray();
        } else {
            $this->permissions = [];
        }
    }

    public function updatedUpdateAll($value)
    {
        if ($value) {
            $this->permissions = $this->role->permissions()->pluck('id')->toArray();
        } else {
            $this->permissions = [];
        }
    }

    public function render()
    {
        $this->viewData();
        return view('controlpanel::livewire.apps.access');
    }

    public function viewData()
    {
        $roles = $this->app->getUnassignedRoles();
        $permissions = $this->app->permissions()->get();
        $this->with('roles', $roles);
        $this->with('permissions', $permissions);
    }


}
