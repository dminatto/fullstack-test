<?php

namespace Weather\Api\App\Controllers;

use Weather\Api\Infrastructure\Factories\ExceptionFactory;
use Weather\Api\Infrastructure\Http\OpenWeatherService;

class WeatherController
{
    public function findWeatherCity($request)
    {
        if (!isset($request['nameCity'])) {
            throw ExceptionFactory::invalidRequest("parameter not found");
        }

        $query = $request['nameCity'];

        $city = (new OpenWeatherService())->findWeather($query);
        return $city->toArray();
    }
}

