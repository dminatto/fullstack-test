<?php

namespace Weather\Api\Infrastructure\Factories;

use Weather\Api\Domain\City;

class WeatherFactory
{
    public static function create($entry)
    {
            $city = new City();

            $city->setName($entry->name);
            $city->setDescription($entry->weather[0]->description);
            $city->setTemperature($entry->main->temp);

        return $city;
    }
}
