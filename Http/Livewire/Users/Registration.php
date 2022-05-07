<?php

namespace Luanardev\Modules\ControlPanel\Http\Livewire\Users;
use Luanardev\LivewireUI\LivewireUI;
use Luanardev\Modules\Institution\Entities\Campus;
use Luanardev\Modules\ControlPanel\Events\UserCreated;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\System;
use App\Models\Role;

class Registration extends LivewireUI
{
    public User $user;

    public $role;

    public function mount()
    {
        $this->user = new User;
    }

    public function render()
    {
        $this->viewData();
        return view('controlpanel::livewire.users.create');
    }

    public function save()
    {
        $this->validate();

        if($this->user->emailTaken()){
            return false;
        }

        $password = Str::upper(Str::random(8));
        $this->user->setPassword($password);
        $this->user->syncRoles($this->role);
        $this->user->save();

        UserCreated::dispatch($this->user, $password);

        $this->alert('User created successfully');

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

    public function viewData()
    {
        $this->with('roles', Role::getWithoutAdmin());
        $this->with('campuses', Campus::getByUser());
    }

    

}
