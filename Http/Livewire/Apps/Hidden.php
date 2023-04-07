<?php

namespace Lumis\Controlpanel\Http\Livewire\Apps;

use App\Models\App;
use Luanardev\LivewireUI\LivewireUI;


class Hidden extends LivewireUI
{
    public $apps = [];

    public function mount()
    {
        $this->apps = App::getTemporaryHidden();
    }

    public function render()
    {
        return view('controlpanel::livewire.apps.hidden');
    }


}
