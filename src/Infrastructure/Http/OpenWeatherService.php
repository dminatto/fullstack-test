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
        try{

            $res = $this->client->request('GET', "?q={$query}&appid=".getenv('OPENWEATHER_KEY'));
            $body = $res->getBody();
        }catch (\Exception $e){
            var_dump($e);exit;
        }

        return WeatherFactory::create(json_decode($body));
    }
}
