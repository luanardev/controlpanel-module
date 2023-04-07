<?php

namespace Lumis\Controlpanel\Http\Livewire\Users;

use App\Models\Role;
use App\Models\User;
use Luanardev\LivewireUI\LivewireUI;


class UserRole extends LivewireUI
{
    public User $user;

    public $role;

    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function create()
    {
        $this->createMode();
    }

    public function show()
    {
        $this->browseMode();
    }

    public function delete($role)
    {
        $this->user->removeRole($role);
        $this->user->save();
        $this->browseMode()->emitRefresh()->toastr('User Role Deleted');
    }

    public function save()
    {
        $this->validate();
        $this->user->assignRole($this->role);
        $this->user->save();
        $this->browseMode()->emitRefresh()->toastr('User Role Assigned');
    }

    public function rules()
    {
        return [
            'role' => 'required'
        ];
    }

    public function render()
    {
        $this->viewData();
        return view('controlpanel::livewire.users.user-role');
    }

    public function viewData()
    {
        $roles = $this->unassigned();
        $this->with('roles', $roles);
    }

    private function unassigned()
    {
        $roles = Role::getWithoutAdmin();
        $unassigned = [];
        foreach ($roles as $role) {
            if (!$this->user->hasRole($role)) {
                $unassigned[] = $role;
            }
        }
        return $unassigned;
    }
}
