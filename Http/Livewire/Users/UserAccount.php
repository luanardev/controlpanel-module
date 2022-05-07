<?php

namespace Luanardev\Modules\ControlPanel\Http\Livewire\Users;
use Luanardev\LivewireUI\LivewireUI;
use Luanardev\Modules\Institution\Entities\Campus;
use Luanardev\Modules\ControlPanel\Events\UserUpdated;
use Luanardev\Modules\ControlPanel\Events\PasswordReset;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Role;

class UserAccount extends LivewireUI
{
    public User $user;

    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function edit($id=null)
    {
        $this->editMode();       
    }

    public function show()
    {
        $this->browseMode();
    }

    public function save()
    {
        $this->user->save();
        $this->browseMode()->emitRefresh()->toastr('User Account updated');
    }

    public function password()
    {
        $password = Str::upper(Str::random(8));
        $this->user->setPassword($password);
        $this->user->save();
        PasswordReset::dispatch($this->user, $password);
        $this->emitRefresh()->toastr('Password reset successful');
    }

    public function activate()
    {
        $this->user->activate();
        $this->emitRefresh()->toastr('User Account activated');
    }

    public function deactivate()
    {
        $this->user->deactivate();
        $this->emitRefresh()->toastr('User Account deactivated');
    }

    public function delete()
    {
        $this->user->delete();
        $this->alert('User Account deleted successfully');
        $this->redirect(route('users.index'));
    }

    public function rules()
    {
        return [
            'user.name'      => 'required|string',
            'user.email'     => 'required|email',
            'user.campus'    => 'nullable|string',
            'role'           => 'required'
        ];
    }

    public function render()
    {
        $this->viewData();
        return view('controlpanel::livewire.users.user-account');
    }

    public function viewData()
    {
        $this->with('campuses', Campus::getByUser());
    }
}
