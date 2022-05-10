<?php

namespace Luanardev\Modules\ControlPanel\Http\Livewire\Modules;
use Luanardev\LivewireUI\LivewireUI;
use App\Models\System;
use App\Models\Role;
use App\Models\Permission;

class Access extends LivewireUI
{
    public System $module;

    public $role;

    public $permissions = array();

    public $selectAll = false;

    public $updateAll = false;

    public function mount(System $module)
    {
        $this->module = $module;
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

    public function edit($id=null)
    {
        $this->updateAll = true;
        $this->role = Role::findorfail($id);
        $this->permissions = $this->role->permissions()->pluck('id')->toArray();
        $this->editMode();
    }

    public function store()
    {
        $role = Role::findorfail($this->role);
        $role->syncPermissions($this->permissions);
        $this->role = null;
        $this->permissions = [];
        $this->selectAll = false;
        $this->emitRefresh()->browseMode()->toastr('Role ACL created');
    }

    public function update()
    {
        $this->role->syncPermissions($this->permissions);
        $this->updateAll = false;
        $this->emitRefresh()->browseMode()->toastr('Role ACL updated');
    }

    public function updatedSelectedRights($value)
    {
        if($value){
            if($this->selectAll){
                $this->selectAll = false;
            }          
        }
    }

    public function updatedSelectAll($value)
    {
        if($value){
            $this->permissions = $this->module->permissions()->pluck('id')->toArray();
        }else{
            $this->permissions = [];
        }
    }

    public function updatedUpdateAll($value)
    {
        if($value){
            $this->permissions = $this->role->permissions()->pluck('id')->toArray();
        }else{
            $this->permissions = [];
        }
    }

    public function cancel()
    {
        $this->role = null;
        $this->permissions = [];
    }

    public function render()
    {
        $this->viewData();
        return view('controlpanel::livewire.modules.access'); 
    }

    public function viewData()
    {
        $unassignedRoles = $this->module->unassignedRoles();
        $permissions = $this->module->permissions()->get();
        $this->with('unassignedRoles', $unassignedRoles);    
        $this->with('permissions', $permissions);
    }

   
}
