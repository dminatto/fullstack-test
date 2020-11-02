<?php

namespace Weather\Api\Infrastructure\Factories;

use Exception;

class ExceptionFactory
{
    public static function sucesso($mensagem)
    {
        return new Exception($mensagem, 200);
    }

    public static function requisicaoInvalida($mensagem)
    {
        return new Exception($mensagem, 400);
    }

    public static function naoAutorizado($mensagem)
    {
        return new Exception($mensagem, 401);
    }

    public static function naoEncontrado($mensagem)
    {
        return new Exception($mensagem, 404);
    }

    public static function erroInterno($mensagem)
    {
        return new Exception($mensagem, 500);
    }

    public static function exceptionToJson(Exception $e)
    {
        $json = ['code' => $e->getCode(), 'message' => $e->getMessage()];

        return json_encode($json);
    }
}