<?php

namespace Weather\Api\App\Controllers;

use Weather\Api\Infrastructure\Http\OpenWeatherService;

class WeatherController
{
    public function findWeatherCity($query)
    {
        $options = (new OpenWeatherService())->findWeather($query);
        return json_encode($options);
    }
}

