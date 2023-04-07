<?php

namespace Lumis\Controlpanel\Http\Livewire\Roles;

use App\Models\App;
use App\Models\Role;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Luanardev\LivewireUI\LivewireUI;

class Permissions extends LivewireUI
{
    public App $app;

    public Role $role;

    public array $permissions = array();

    public bool $updateAll = false;

    public bool $checkAll = true;

    public function mount(Role $role, App $app)
    {
        $this->app = $app;
        $this->role = $role;
        $this->permissions = $this->role->permissions()->pluck('id')->toArray();
    }

    public function update()
    {
        $currentPermissions = $this->getRolePermissions();

        $this->removePermissions($currentPermissions);

        $this->addPermissions($this->permissions);

        $this->updateAll = false;
        $this->emitRefresh()->browseMode()->toastr('Role ACL updated');
    }

    private function getRolePermissions(): Collection
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

    private function addPermissions($permissions)
    {
        foreach ($permissions as $permission) {
            $this->role->givePermissionTo($permission);
        }
    }

    public function updatedUpdateAll($value)
    {
        if ($value) {
            $this->permissions = $this->app->permissions()->pluck('id')->toArray();
        } else {
            $this->permissions = [];
        }
    }

    public function render(): Factory|View|Application
    {
        $this->viewData();
        return view('controlpanel::livewire.roles.permissions');
    }

    public function viewData()
    {
        $permissions = $this->app->permissions()->get();
        $this->with('permissions', $permissions);
    }

}
