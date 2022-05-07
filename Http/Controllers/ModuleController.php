<?php

namespace Luanardev\Modules\ControlPanel\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\System;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('controlpanel::modules.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @param System $system
     * @return Renderable
     */
    public function show(System $module)
    {
        if($module->isDefault()){
            return back();
        }
        return view('controlpanel::modules.show')->with([
            'module' => $module
        ]);
    }

    
}
