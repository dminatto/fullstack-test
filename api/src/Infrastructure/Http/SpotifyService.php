<?php

namespace Weather\Api\Infrastructure\Http;

class SpotifyService
{
    private $client;

    /**
     * OpenWeatherService constructor.
     */
    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => getenv('SPOTIFY_API'),
            '' => getenv('')
        ]);
    }

    public function getPlaylist($style)
    {
        $res = $this->client('GET', "{$style}/tracks");
        $body = $res->getBody();
        return json_decode($body);
    }
}
