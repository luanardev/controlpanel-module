<?php

namespace Luanardev\Modules\ControlPanel\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $this->authorize('view_role');
        return view('controlpanel::roles.index');
    }


    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $this->authorize('create_role');
        return view('controlpanel::roles.create');
    }

    /**
     * Show the specified resource.
     * @param Role $role
     * @return Renderable
     */
    public function show(Role $role)
    {
        $this->authorize('role_user');
        return view('controlpanel::roles.show')->with([
            'role' => $role
        ]);
    }

    /**
     * Remove the specified resource from storage.
     * @param Role $role
     * @return Renderable
     */
    public function destroy(Role $role)
    {
        $this->authorize('delete_role');
        $role->delete();
        return redirect()->route('roles.index')->with('success', 'Role Deleted');
    }
}
