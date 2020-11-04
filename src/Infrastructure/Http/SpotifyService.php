<?php

namespace Weather\Api\Infrastructure\Http;

use SpotifyWebAPI\Session;
use SpotifyWebAPI\SpotifyWebAPI;
use Weather\Api\Infrastructure\Factories\PlaylistFactory;

class SpotifyService
{
    private $session;
    private $api;

    /**
     * OpenWeatherService constructor.
     */
    public function __construct()
    {
        $this->session = new Session(
            'CLIENT_ID',
            'CLIENT_SECRET',
            'REDIRECT_URI'
        );

        $this->api = new SpotifyWebAPI();
    }

    public function getPlaylist($style)
    {
        $recommendations = $this->api->getRecommendations([
            'seed_tracks' => $style,
        ]);

        return PlaylistFactory::create(json_decode($recommendations));
    }
}
