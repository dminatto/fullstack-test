<?php

namespace Weather\Api\Domain;

use Weather\Api\Infrastructure\Http\SpotifyService;

class ChoosenTracks
{
    const PARTY_MUSIC = "1NntTMz0L8e1Cc9U44UPLb";
    const POP_MUSIC = "1NntTMz0L8e1Cc9U44UPLb";
    const ROCK_MUSIC = "1NntTMz0L8e1Cc9U44UPLb";
    const CLASSIC_MUSIC = "1NntTMz0L8e1Cc9U44UPLb";

    private $temperature;

    /**
     * ChoosenTracks constructor.
     * @param $temperature
     */
    public function __construct($temperature)
    {
        $this->temperature = $temperature;
    }

    public function get()
    {
        switch ($this->temperature) {
            case $this->temperature > 30:
                $typePlaylist = self::PARTY_MUSIC;
                break;
            case ($this->temperature >= 15 && $this->temperature <= 30):
                $typePlaylist = self::POP_MUSIC;
                break;
            case ($this->temperature >= 10 && $this->temperature <= 14):
                $typePlaylist = self::ROCK_MUSIC;
                break;
            default:
                $typePlaylist = self::CLASSIC_MUSIC;
                break;
        }

        return (new SpotifyService())->getPlaylist($typePlaylist);
    }
}
