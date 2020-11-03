<?php

namespace Weather\Api\Infrastructure\Factories;

use Exception;

class ExceptionFactory
{
    public static function sucess($mensagem)
    {
        return new Exception($mensagem, 200);
    }

    public static function invalidRequest($mensagem)
    {
        return new Exception($mensagem, 406);
    }

    public static function notAuthorized($mensagem)
    {
        return new Exception($mensagem, 401);
    }

    public static function notFound($mensagem)
    {
        return new Exception($mensagem, 404);
    }

    public static function internalError($mensagem)
    {
        return new Exception($mensagem, 500);
    }

    public static function exceptionToJson(Exception $e)
    {
        $json = ['code' => $e->getCode(), 'message' => $e->getMessage()];

        return json_encode($json);
    }
}