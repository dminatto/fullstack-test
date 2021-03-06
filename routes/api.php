<?php

use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Http\StatusCode;
use Weather\Api\App\Controllers\MusicController;
use Weather\Api\App\Controllers\WeatherController;

$app->group('/v1', function () use ($app) {

    /**
     * @api {post} v1/find-city search term typed in the APP
     * @apiName findWeatherCity
     * @apiGroup Weather
     * @apiParam {String} term City name (or half)
     * @apiParamExample {json} Request-Example:
     * {
     *      "nameCity": "Crici"
     * }
     * @apiSuccess Success Dados essenciais para atendimento
     * @apiSuccessExample {json} Sucesso
     *    {
     *          "name": Criciúma,
     *          "description" : ""broken clouds"",
     *          "temperature" : 27
     *    }
     * @apiError (406) InvalidParameters Parameter not found
     * @apiError (404) NotFound No cities found
     */
    $app->post('/find-city', function (Request $request, Response $response) {
        $re = (new WeatherController())->findWeatherCity($request->getParsedBody());
        return $response->withStatus(StatusCode::HTTP_OK)
            ->withJson($re);
    });

    /**
     * @api {post} v1/playlist return a playlist match with weather
     * @apiName getSugestion
     * @apiGroup Music
     * @apiParam {String} temperature Temperature of city
     * @apiParamExample {json} Request-Example:
     * {
     *      "temperature": "31"
     * }
     * @apiSuccess Success Dados essenciais para atendimento
     * @apiSuccessExample {json} Sucesso
     *    {
     *          "name": Dynamate,
     *          "artist": BTS,
     *          "link": "https://open.spotify.com/track/0v1x6rN6JHRapa03JElljE"
     *    }
     * @apiError (406) InvalidParameters parameter not found
     */
    $app->post('/playlist', function (Request $request, Response $response) {
        $re = (new MusicController())->getSugestion($request->getParsedBody());
        return $response->withStatus(StatusCode::HTTP_OK)
            ->withJson($re);
    });

});