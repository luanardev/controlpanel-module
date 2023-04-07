<?php

namespace Lumis\Controlpanel\Http\Livewire\Users;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Str;
use Luanardev\LivewireUI\LivewireUI;
use Lumis\Controlpanel\Events\UserCreated;
use Lumis\Organization\Entities\Campus;

class Registration extends LivewireUI
{
    public User $user;
    public $role;
    public $campus;

    public function mount()
    {
        $this->user = new User;
    }

    public function render()
    {
        $this->viewData();
        return view('controlpanel::livewire.users.create');
    }

    public function viewData()
    {
        $this->with('roles', Role::getWithoutAdmin());
        $this->with('campuses', Campus::getByUser());
    }

    public function save()
    {
        $this->validate();

        if ($this->user->emailTaken()) {
            $this->alert('Email already taken');
            return false;
        }

        $password = Str::upper(Str::random(8));
        $this->user->setPassword($password);
        if(isset($this->role)){
            $this->user->assignRole($this->role);
        }
        if (isset($this->campus)) {
            $this->user->setCampus($this->campus);
        }

        $this->user->save();

        UserCreated::dispatch($this->user, $password);

        $this->alert('User created successfully');

        $this->redirect(route('users.index'));
    }

    public function rules()
    {
        return [
            'user.name' => 'required|string',
            'user.email' => 'required|email',
            'campus' => 'nullable|string',
            'role' => 'nullable|string'
        ];
    }


}
