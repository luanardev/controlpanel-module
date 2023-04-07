<?php

namespace Lumis\Controlpanel\Http\Livewire\Apps;

use App\Models\App;
use Luanardev\LivewireUI\LivewireUI;


class Installed extends LivewireUI
{
    public $apps = [];

    public $search;

    public $filter;

    public function mount()
    {
        $this->apps = App::getWithoutDefault();
    }

    public function updatedSearch($value)
    {
        $this->apps = App::search($value);
    }

    public function updatedFilter($value)
    {
        switch ($value) {
            case 'Enabled':
                $this->apps = App::getEnabled();
                break;
            case 'Disabled':
                $this->apps = App::getDisabled();
                break;
            case 'Hidden':
                $this->apps = App::getTemporaryHidden();
                break;
            default:
                $this->apps = App::getWithoutDefault();
                break;
        }

    }

    public function render()
    {
        return view('controlpanel::livewire.apps.installed');
    }


}
