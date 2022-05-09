<?php

namespace Luanardev\Modules\ControlPanel\Http\Livewire\Organisation;
use Luanardev\Modules\ControlPanel\Http\Livewire\Livewire;
use Luanardev\LivewireUI\LivewireUI;
use Livewire\WithFileUploads;
use Storage;
use OrgSettings;

class OrgLogo extends LivewireUI
{
    use WithFileUploads;

    public $logo;

    public function render()
    {
        return view("controlpanel::livewire.organisation.logo");
    }

    public function show()
    {
        $this->browseMode();
    }

    public function create()
    {
        $this->createMode();
    }

    public function save()
    {
        if(empty($this->logo)){
            return;
        }
        $this->validate([
            'logo' => 'required|image|max:10240',
        ]);

        $currentLogo = OrgSettings::get('company_logo');

        $path = $this->logo->storePublicly('platform/logo','public');
        
        OrgSettings::put('company_logo', $path);

        if(Storage::exists("public/".$currentLogo)){
            Storage::delete("public/".$currentLogo);
        }
        $this->browseMode()->emitRefresh()->toastr('Logo saved');
    }


}
