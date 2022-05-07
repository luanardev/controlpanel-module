<?php

namespace Luanardev\Modules\ControlPanel\Http\Livewire\Modules;
use Luanardev\LivewireUI\LivewireUI;
use App\Models\System;
use Module;
use Artisan;

class Repository extends LivewireUI
{
    protected $modules=[];

    public function mount()
    {
        $this->modules();       
    }

    public function install($module)
    {
        if(Module::has($module) ){
            if(!$this->installed($module)){
                Artisan::call("module:install {$module}");
                $this->emitRefresh()->toastr("Installation successful");
            }
        }
    }

    public function render()
    {
        return view('controlpanel::livewire.modules.repository', [
            'modules' => $this->modules
        ]);
    }

    private function modules()
    {
        $modules = Module::all();
        foreach($modules as $module){
            if(!$this->installed($module->getName())){
                $this->modules[] = $module;
            }
        }
    }

    private function installed($module)
    {
        return System::installed($module);
    }
}
