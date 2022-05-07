<?php

namespace Luanardev\Modules\ControlPanel\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $this->authorize('view_user');
        return view('controlpanel::users.index');
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function search()
    {
        $this->authorize('view_user');
        return view('controlpanel::users.search');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $this->authorize('create_user');
        return view('controlpanel::users.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $this->authorize('create_user');
    }

    /**
     * Show the specified resource.
     * @param User $user
     * @return Renderable
     */
    public function show(User $user)
    {
        $this->authorize('view_user');
        return view('controlpanel::users.show')->with([
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param User $user
     * @return Renderable
     */
    public function edit(User $user)
    {
        $this->authorize('update_user');

        return view('controlpanel::users.edit')->with([
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param User $user
     * @return Renderable
     */
    public function update(Request $request, User $user)
    {
        $this->authorize('update_user');
    }

    /**
     * Remove the specified resource from storage.
     * @param User $user
     * @return Renderable
     */
    public function destroy(User $user)
    {
        $this->authorize('delete_user');
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User Account Deleted');
    }
}
