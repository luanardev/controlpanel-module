<?php

namespace Lumis\Controlpanel\Http\Livewire\Users;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Str;
use Luanardev\LivewireUI\LivewireUI;
use Lumis\Controlpanel\Events\PasswordReset;
use Lumis\Organization\Entities\Campus;
use Lumis\Organization\Entities\UserCampus;

class UserAccount extends LivewireUI
{
    public User $user;
    public $userCampus;
    public $campus;
    public $role;

    public function mount(User $user)
    {
        $this->user = $user;

        $campus = UserCampus::get($user);
        $this->userCampus = $campus?->name;
        $this->campus = $campus?->id;
    }

    public function edit($id = null)
    {
        $this->editMode();
    }

    public function show()
    {
        $this->browseMode();
    }

    public function password()
    {
        $password = Str::upper(Str::random(8));
        $this->user->setPassword($password);
        $this->user->save();
        PasswordReset::dispatch($this->user, $password);
        $this->emitRefresh()->toastr('Password reset successful');
    }

    public function save()
    {
        if (isset($this->campus)) {
            $this->user->setCampus($this->campus);
        }
        if(isset($this->role)){
            $this->user->assignRole($this->role);
        }
        $this->user->save();
        $this->browseMode()->emitRefresh()->toastr('User Account updated');
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
            'user.name' => 'required|string',
            'user.email' => 'required|email',
            'campus' => 'nullable|string',
            'role' => 'nullable|string',
        ];
    }

    public function render()
    {
        $this->viewData();
        return view('controlpanel::livewire.users.user-account');
    }

    public function viewData()
    {
        $this->with('campuses', Campus::all());
        $this->with('roles', Role::all());
    }
}
