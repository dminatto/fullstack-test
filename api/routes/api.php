<?php

use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Http\StatusCode;
use Weather\Api\App\Controllers\WeatherController;

$app->group('/v1', function () use ($app) {

    /**
     * @api {post} v1/find-city search term typed in the APP
     * @apiName findWeatherCity
     * @apiGroup Weather
     * @apiParam {String} term City name (or half)
     * @apiParamExample {json} Request-Example:
     * {
     *      "term": "Crici"
     * }
     * @apiSuccess Success Dados essenciais para atendimento
     * @apiSuccessExample {json} Sucesso
     *    {
     *          "name": Criciúma,
     *          "description" : ""broken clouds"",
     *          "temperature" : 27
     *    }
     * @apiError (406) InvalidParameters Invalid parameter
     * @apiError (404) NotFound No cities found
     */
    $app->post('/find-city', function (Request $request, Response $response) {
        $re = (new WeatherController())->findWeatherCity($request->getParsedBody());
        return $response->withStatus(StatusCode::HTTP_OK)
            ->withJson($re);
    });

    $app->post('/playlist', function (Request $request, Response $response) {

    });

});