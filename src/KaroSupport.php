<?php


namespace Karo\Support;


use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Http;

class KaroSupport extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'karosupport';
    }
}
