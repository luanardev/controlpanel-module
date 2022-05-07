<?php

namespace Luanardev\Modules\ControlPanel\Http\Livewire\Organisation;
use Luanardev\LivewireUI\LivewireUI;
use Luanardev\Library\Enums\Country;
use OrgSettings;

class OrgInfo extends LivewireUI
{
    public $settings = array();

    public function __construct()
    {
        parent::__construct();
        $this->settings = OrgSettings::getSettings();
    }

    public function render()
    {
        $this->viewData();
        return view("controlpanel::livewire.organisation.info");
    }

    public function save()
    {
        OrgSettings::saveAll($this->settings);
        $this->emitRefresh()->toastr('Settings saved');
    }

    public function viewData()
    {
        $this->with('country', Country::get());
    }


}
