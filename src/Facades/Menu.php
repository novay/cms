<?php

namespace Novay\CMS\Facades;

use Illuminate\Support\Facades\Facade;

class Menu extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'menu';
    }
}