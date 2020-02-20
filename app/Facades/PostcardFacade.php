<?php

namespace App\Facades;

class PostcardFacade
{
    /**
     * @param $name
     * @return mixed
     */
    public static function resolveFacade($name)
    {
        return app()[$name];
    }

    /**
     * @param $methodName
     * @param $arguments
     * @return mixed
     */
    public static function __callStatic($methodName, $arguments)
    {
        return (self::resolveFacade('PostcardFacade'))
            ->$methodName(...$arguments);
    }
}
