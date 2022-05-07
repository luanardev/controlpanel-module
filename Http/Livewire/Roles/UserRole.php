<?php

namespace Luanardev\Modules\ControlPanel\Http\Livewire\Roles;
use Luanardev\LivewireUI\LivewireUI;
use Illuminate\Support\Str;
use App\Models\Role;
use App\Models\Permission;
use App\Models\System;

class UserRole extends LivewireUI
{
    public Role $role;

    public $selectGroup;

    public $selectAll;

    public $permissions = [];


    public function mount(Role $role=null)
    {
        if(empty($role)){
            $this->createMode();
            $this->role = new Role();
            
        }else{
            $this->editMode();
            $this->role = $role;
            $this->permissions = $role->permissions()->pluck('id')->map(fn($id)=>(string)$id)->toArray();
        }

    }

    private function isSelectGroup($key)
    {
        $explode = Str::of($key)->explode('.');
        return ($explode[0] == 'selectGroup') ?true:false;
    }

    private function getGroupKey($key)
    {
        $explode = Str::of($key)->explode('.');
        return $explode[1];
    }

    private function getPermissions($groupkey)
    {
        return System::find($groupkey)
            ->permissions()
            ->pluck('id')
            ->map(fn($id)=>(string)$id)
            ->toArray();
    }

    public function updated($key, $value)
    {
        if($this->isSelectGroup($key) && is_numeric($value)){
            $permissionIds = $this->getPermissions($value);
            $this->permissions = array_values(array_unique(array_merge_recursive($this->permissions, $permissionIds)));
        }
        elseif($this->isSelectGroup($key) && empty($value)){
            $value = $this->getGroupKey($key);
            $permissionIds = $this->getPermissions($value);
            $this->permissions = array_merge(array_diff($this->permissions, $permissionIds));
        }
    }

    public function save()
    {
        $this->validate();

        $this->role->syncPermissions($this->permissions);
        $this->role->save();

        if($this->createMode){
            $this->alert("Role created successfully");
            $this->redirect(route('roles.index'));
        }else{
            $this->emitRefresh()->toastr('Role updated successfully');
        }
       
    }

    public function delete()
    {
        $this->role->delete();
        $this->alert("Role deleted successfully");
        $this->redirect(route('roles.index'));
    }

    public function rules()
    {
        return [
            'role.name'     => 'required|string',
            'permissions'   => 'nullable|array',
        ];
    }

    public function render()
    {
        $this->viewData();
        return view('controlpanel::livewire.roles.user-role');
    }

    public function viewData()
    {
        $modules = System::getWithoutDefault();
        $this->with('modules', $modules);
    }

}
