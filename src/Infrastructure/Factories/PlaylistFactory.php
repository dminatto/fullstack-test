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

            $track = new Music();

            $track->setName($entry->name);
            $track->setArtist($entry->name);
            $track->setLink($entry->name);

            $list[] = $track;
        }

        return $list;

    }
}
