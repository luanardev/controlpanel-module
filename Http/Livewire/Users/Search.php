<?php

namespace Luanardev\Modules\ControlPanel\Http\Livewire\Users;
use Luanardev\LivewireUI\LivewireUI;
use App\Models\User;

class Search extends LivewireUI
{
    public $term;
    public $results;
    public $route;

    public function mount($route)
    {
        $this->route = $route;
    }

    public function render()
    {
        return view("controlpanel::livewire.users.search");
    }

    public function search()
    {
        if(empty($this->term)){
            return false;
        }
        $this->results = User::search($this->term)->get();
    }


}
