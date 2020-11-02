<?php

namespace Weather\Api\Infrastructure\Factories;

use Weather\Api\Domain\City;

class WeatherFactory
{
    public static function create($entries)
    {

        $list = [];

        foreach ($entries as $entry) {

            $city = new City();

            $city->setName($entry->name);
            $city->setDescription($entry->weather->description);
            $city->setTemperature($entry->main->temp);


            $list[] = $city;
        }

        return $list;

    }
}