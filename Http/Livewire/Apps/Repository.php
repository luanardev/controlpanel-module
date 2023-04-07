<?php

namespace Lumis\Controlpanel\Http\Livewire\Apps;

use App\Models\App;
use Artisan;
use Luanardev\LivewireUI\LivewireUI;
use Module;

class Repository extends LivewireUI
{
    protected $apps = [];

    public function mount()
    {
        $this->modules();
    }

    private function modules()
    {
        $apps = Module::all();
        foreach ($apps as $app) {
            if (!$this->installed($app->getName())) {
                $this->apps[] = $app;
            }
        }
    }

    private function installed($app)
    {
        return App::installed($app);
    }

    public function install($app)
    {
        if (Module::has($app)) {
            if (!$this->installed($app)) {
                Artisan::call("module:install {$app}");
                $this->emitRefresh()->toastr("Installation successful");
                $this->redirect(route('apps.index'));
            }
        }
    }

    public function render()
    {
        return view('controlpanel::livewire.apps.repository', [
            'apps' => $this->apps
        ]);
    }
}
