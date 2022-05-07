<?php

namespace Luanardev\Modules\ControlPanel\Http\Livewire\Modules;
use Luanardev\LivewireUI\LivewireUI;
use App\Models\System;

class Installed extends LivewireUI
{
    public $modules = [];

    public $search;

    public function mount()
    {
        $this->modules = System::getWithoutDefault();        
    }

    public function updatedSearch($value)
    {
        $this->modules = System::search($value);
    }

    public function render()
    {
        return view('controlpanel::livewire.modules.installed');
    }

    
}
