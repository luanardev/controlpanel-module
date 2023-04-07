<?php

namespace Lumis\Controlpanel\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\App;
use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return Renderable
     * @throws AuthorizationException
     */
    public function index(Request $request): Renderable
    {
        $this->authorize('controlpanel-home');

        $appCount = App::count();
        $roleCount = Role::count();
        $userCount = User::count();

        return view('controlpanel::home')->with(compact('appCount', 'roleCount', 'userCount'));
    }


}
