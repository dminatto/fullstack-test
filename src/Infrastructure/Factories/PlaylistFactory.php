<?php

namespace Weather\Api\Infrastructure\Factories;

use Weather\Api\Domain\Music;
use Weather\Api\Domain\Playlist;

class PlaylistFactory
{
    public static function create($entries)
    {
        $playlist = new Playlist();

        foreach ($entries as $entry) {

            $city = new Music();

            $city->setName($entry->name);


            $list[] = $city;
        }

        return $list;

    }
}
