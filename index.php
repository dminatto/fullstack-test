<?php

use Weather\Api\App\Facades\Bootstrap;
use Weather\Api\App\Middleware\Cors;
use Weather\Api\App\Middleware\ErrorHandle;
use Weather\Api\Infrastructure\Http\ResponseJSON;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Http\StatusCode;

require __DIR__ . '/vendor/autoload.php';

date_default_timezone_set('America/Sao_Paulo');
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/error_log.txt');
error_reporting(E_ALL);

Bootstrap::start();

$container = new Slim\Container(['settings' => [
    'displayErrorDetails' => true,
]]);
$container['notFoundHandler'] = function ($c) {
    return function (Request $request, Response $response) {
        return $response->withStatus(StatusCode::HTTP_NOT_FOUND)
            ->withJson(ResponseJSON::createNotFoundError('Not found')->toArray());
    };
};

$app = new Slim\App($container);
$app->add(new ErrorHandle());
$app->add(new Cors());

require __DIR__ . './routes/api.php';

$app->run();
