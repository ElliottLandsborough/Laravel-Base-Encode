<?php

namespace Elliottlan\LaravelBaser\Facades;

use Illuminate\Support\Facades\Facade;

class Baser extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'baser';
    }
}
