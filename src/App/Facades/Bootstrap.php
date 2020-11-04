<?php

namespace Weather\Api\App\Facades;

use Dotenv\Dotenv;
use Illuminate\Database\Capsule\Manager;

class Bootstrap
{
    public static function start()
    {
        self::config();
        self::loadEnv();
    }

    public static function loadEnv()
    {

        $dotenv = Dotenv::create(__DIR__ . '/../../../');
        $dotenv->load();
    }

    private static function config()
    {
        date_default_timezone_set('America/Sao_Paulo');
    }
}
