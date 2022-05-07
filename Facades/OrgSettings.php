<?php

namespace Luanardev\Modules\ControlPanel\Facades;
use Illuminate\Support\Facades\Facade;

class OrgSettings extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'orgsettings';
    }

}

