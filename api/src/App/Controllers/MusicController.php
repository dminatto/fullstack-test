<?php

namespace Weather\Api\App\Controllers;

use Weather\Api\Domain\ChoosenTracks;

class MusicController
{
    public function getSugestion($temperature)
    {
        $tracks = (new ChoosenTracks($temperature))->get();


        return $tracks;
    }
}
