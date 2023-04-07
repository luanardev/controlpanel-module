<?php

namespace Lumis\Controlpanel\Http\Livewire\Users;

use App\Models\User;
use Luanardev\LivewireUI\LivewireUI;

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
        if (empty($this->term)) {
            return false;
        }
        $this->results = User::search($this->term)->get();
    }


}
