<?php

namespace Weather\Api\Infrastructure\Http;

use GuzzleHttp\Client;
use Weather\Api\Infrastructure\Factories\WeatherFactory;

class OpenWeatherService
{
    private $client;

    /**
     * OpenWeatherService constructor.
     */
    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => getenv('OPENWEATHER_API')
        ]);
    }

    public function findWeather($query)
    {
        $res = $this->client('GET', "?q={$query}&appid=".getenv('OPENWEATHER_KEY'));
        $body = $res->getBody();

        return WeatherFactory::create(json_decode($body));
    }
}
