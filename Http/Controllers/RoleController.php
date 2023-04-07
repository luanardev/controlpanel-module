<?php

namespace Lumis\Controlpanel\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\App;
use App\Models\Role;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;


class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     * @throws AuthorizationException
     */
    public function index(): Renderable
    {
        $this->authorize('read-role');
        return view('controlpanel::roles.index');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function store(Request $request): RedirectResponse
    {
        $this->authorize('create-role');

        $role = Role::create($request->all());

        return redirect()->route('roles.show', $role)->with('success', 'Role created');

    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     * @throws AuthorizationException
     */
    public function create(): Renderable
    {
        $this->authorize('create-role');
        return view('controlpanel::roles.create');
    }

    /**
     * Show the specified resource.
     * @param Role $role
     * @return View|Factory|Renderable|Application|RedirectResponse
     * @throws AuthorizationException
     */
    public function show(Role $role): View|Factory|Renderable|Application|RedirectResponse
    {
        $this->authorize('read-role');

        if ($role->isAdmin()) {
            return redirect()->route('roles.index');
        }

        $app = App::getAdminGroup()->first();

        return $this->addPermissions($role, $app);
    }

    /**
     * @param Role $role
     * @param App $app
     * @return Application|Factory|View|RedirectResponse
     * @throws AuthorizationException
     */
    public function addPermissions(Role $role, App $app): View|Factory|RedirectResponse|Application
    {
        $this->authorize('update-role');

        if ($role->isAdmin()) {
            return redirect()->route('roles.index');
        }

        $apps = App::getAdminGroup();

        return view('controlpanel::roles.permissions')->with([
            'role' => $role,
            'app' => $app,
            'apps' => $apps
        ]);
    }

    /**
     * Show the specified resource.
     * @param Role $role
     * @return Renderable
     * @throws AuthorizationException
     */
    public function edit(Role $role): Renderable
    {
        $this->authorize('update-role');

        if ($role->isAdmin()) {
            return redirect()->route('roles.index');
        }

        return view('controlpanel::roles.edit')->with([
            'role' => $role
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param Role $role
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function update(Request $request, Role $role): RedirectResponse
    {
        $this->authorize('update-role');

        $role->update($request->all());
        return redirect()->route('roles.index')->with('success', 'Role updated');

    }

    /**
     * Remove the specified resource from storage.
     * @param Role $role
     * @return Renderable
     * @throws AuthorizationException
     */
    public function destroy(Role $role): Renderable
    {
        $this->authorize('delete-role');

        if ($role->isAdmin()) {
            return redirect()->route('roles.index');
        }
        $role->delete();
        return redirect()->route('roles.index')->with('success', 'Role Deleted');
    }

    /**
     * Remove the specified resource from storage.
     * @param Role $role
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function delete(Role $role): RedirectResponse
    {
        $this->authorize('delete-role');

        if ($role->isAdmin()) {
            return redirect()->route('roles.index');
        }
        $role->delete();
        return redirect()->route('roles.index')->with('success', 'Role Deleted');
    }
}
