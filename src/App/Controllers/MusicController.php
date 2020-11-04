<?php

namespace Weather\Api\App\Controllers;

use Weather\Api\Domain\ChoosenTracks;
use Weather\Api\Infrastructure\Factories\ExceptionFactory;

class MusicController
{
    public function getSugestion($request)
    {
        if(!isset($request['temperature'])){
            throw ExceptionFactory::invalidRequest("parameter not found");
        }

        $temperature = $request['temperature'];
        $tracks = (new ChoosenTracks($temperature))->get();
        return json_encode($tracks);
    }
}
