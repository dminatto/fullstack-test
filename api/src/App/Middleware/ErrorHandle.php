<?php

namespace Weather\Api\App\Middleware;

use Exception;
use Weather\Api\Infrastrutcture\Http\ResponseJSON;

class ErrorHandle
{
    public function __invoke($request, $response, $next)
{
    try {
        return $next($request, $response);
    } catch (Exception $e) {
        return $response
            ->withStatus($e->getCode())
            ->withJson(ResponseJSON::create($e->getCode(), [
                'result' => false,
                'message' => $e->getMessage(),
            ]));
    }
}
}