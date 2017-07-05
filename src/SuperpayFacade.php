<?php

namespace Nowpics\Superpay;

use Illuminate\Support\Facades\Facade;

class SuperpayFacade extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'superpay';
    }
}