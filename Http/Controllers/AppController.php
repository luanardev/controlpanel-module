<?php

namespace Lumis\Controlpanel\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\App;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;

class AppController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     * @throws AuthorizationException
     */
    public function index(): Renderable
    {
        $this->authorize('manage-app');
        return view('controlpanel::apps.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @param App $app
     * @return Renderable|RedirectResponse
     * @throws AuthorizationException
     */
    public function show(App $app): Renderable|RedirectResponse
    {
        $this->authorize('manage-app');

        if ($app->isDefault()) {
            return back();
        }
        return view('controlpanel::apps.show')->with([
            'app' => $app
        ]);
    }


}
