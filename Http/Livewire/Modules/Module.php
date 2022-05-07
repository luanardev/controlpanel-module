<?php

namespace Luanardev\Modules\ControlPanel\Http\Livewire\Modules;
use Luanardev\LivewireUI\LivewireUI;
use App\Models\System;
use Artisan;

class Module extends LivewireUI
{
    public System $module;

    public function mount(System $module)
    {
        $this->module = $module;
    }

    public function disable()
    {
        if($this->module->enabled()){
            $this->module->disable();
            $this->emitRefresh()->toastr('Module disabled');
        }    
    }

    public function enable()
    {
        if($this->module->disabled()){
            $this->module->enable();
            $this->emitRefresh()->toastr('Module enabled');
        }
    }

    public function uninstall()
    {
        if($this->module->removable()){
            $module = $this->module->alias;
            Artisan::call("module:uninstall {$module}");
            $this->toastr('Module uninstalled successfully');
            $this->redirect(route('modules.index'));
        }
    }

    public function render()
    {
        return view('controlpanel::livewire.modules.module');
    }


}
