<?php

namespace Lumis\Controlpanel\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     * @throws AuthorizationException
     */
    public function index(): Renderable
    {
        $this->authorize('read-user');
        return view('controlpanel::users.index');
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     * @throws AuthorizationException
     */
    public function search(): Renderable
    {
        $this->authorize('read-user');
        return view('controlpanel::users.search');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     * @throws AuthorizationException
     */
    public function create(): Renderable
    {
        $this->authorize('create-user');
        return view('controlpanel::users.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return void
     * @throws AuthorizationException
     */
    public function store(Request $request): void
    {
        $this->authorize('create-user');
    }

    /**
     * Show the specified resource.
     * @param User $user
     * @return Renderable|RedirectResponse
     * @throws AuthorizationException
     */
    public function show(User $user): Renderable|RedirectResponse
    {
        $this->authorize('read-user');

        if ($user->isAdmin()) {
            return redirect()->route('users.index');
        }

        return view('controlpanel::users.show')->with([
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param User $user
     * @return Renderable
     * @throws AuthorizationException
     */
    public function edit(User $user): Renderable
    {
        $this->authorize('update-user');

        return view('controlpanel::users.edit')->with([
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param User $user
     * @return void
     * @throws AuthorizationException
     */
    public function update(Request $request, User $user): void
    {
        $this->authorize('update-user');
    }

    /**
     * Remove the specified resource from storage.
     * @param User $user
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function destroy(User $user): RedirectResponse
    {
        $this->authorize('delete-user');
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User Account Deleted');
    }
}
