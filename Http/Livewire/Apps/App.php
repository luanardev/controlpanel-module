<?php

namespace Lumis\Controlpanel\Http\Livewire\Apps;

use App\Models\App as Module;
use Illuminate\Support\Str;
use Luanardev\LivewireUI\LivewireUI;
use Artisan;

class App extends LivewireUI
{
    public Module $app;

    public function mount(Module $app)
    {
        $this->app = $app;
    }

    public function edit($id = null)
    {
        $this->editMode();
    }

    public function show()
    {
        $this->browseMode();
    }

    public function update()
    {
        $app = $this->app->alias;
        Artisan::call("module:uninstall {$app}");
        Artisan::call("module:install {$app}");
        $this->toastr('App updated successfully');
        $this->redirect(route('apps.index'));

    }

    public function enable()
    {
        if ($this->app->disabled()) {
            $this->app->enable();
            $this->emitRefresh()->toastr('App enabled');
            $this->redirect(route('apps.index'));
        }
    }

    public function disable()
    {
        if ($this->app->enabled()) {
            $this->app->disable();
            $this->emitRefresh()->toastr('App disabled');
            $this->redirect(route('apps.index'));
        }
    }

    public function hide()
    {
        if ($this->app->isNotHidden()) {
            $this->app->hide();
            $this->emitRefresh()->toastr('App hidden');
            $this->redirect(route('apps.index'));
        }
    }

    public function unhide()
    {
        if ($this->app->isHidden()) {
            $this->app->unhide();
            $this->emitRefresh()->toastr('App unhidden');
            $this->redirect(route('apps.index'));
        }
    }

    public function uninstall()
    {
        if ($this->app->removable()) {
            $app = $this->app->alias;
            Artisan::call("module:uninstall {$app}");
            $this->toastr('App uninstalled successfully');
            $this->redirect(route('apps.index'));
        }
    }

    public function save()
    {
        $this->app->group = Str::upper($this->app->group);
        $this->app->save();
        $this->browseMode()->emitRefresh()->toastr('App updated');
    }

    public function rules()
    {
        return [
            'app.display_name' => 'required|string',
            'app.group' => 'required|string',
            'app.icon' => 'required|string',
            'app.color' => 'nullable|string',
            'app.background' => 'nullable|string',
        ];
    }

    public function render()
    {
        return view('controlpanel::livewire.apps.app');
    }


}
