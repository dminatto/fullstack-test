<?php

namespace Weather\Api\App\Middleware;

use Exception;
use Weather\Api\Infrastructure\Http\ResponseJSON;

class ErrorHandle
{
    public function __invoke($request, $response, $next)
{
    try {
        return $next($request, $response);
    } catch (Exception $e) {
        return $response
            ->withStatus($e->getCode())
            ->withJson(ResponseJSON::createNotFoundError( $e->getMessage()));
    }
}
}