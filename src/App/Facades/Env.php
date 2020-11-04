<?php

namespace Weather\Api\App\Facades;

class Env
{
    public static function producao()
    {
        return getenv('PRODUCTION') === 'true';
    }

    public static function urlApi()
    {
        return self::producao()
            ? getenv('URL_API_PRODUCTION')
            : getenv('URL_API_DEVELOPMENT');
    }

    public static function email()
    {
        return getenv('EMAIL');
    }
}
