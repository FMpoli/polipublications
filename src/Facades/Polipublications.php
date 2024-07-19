<?php

namespace Detit\Polipublications\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Detit\Polipublications\Polipublications
 */
class Polipublications extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Detit\Polipublications\Polipublications::class;
    }
}
