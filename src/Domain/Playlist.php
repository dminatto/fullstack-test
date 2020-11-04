<?php

namespace Weather\Api\Domain;

class Playlist
{
    /**
     * @var Music[]
     */
    private $musics;

    /**
     * @return Music[]
     */
    public function getMusics(): array
    {
        return $this->musics;
    }

    /**
     * @param Music $music
     */
    public function setMusic(Music $music)
    {
        $this->musics[] = $music;
    }

    public function toArray()
    {
        return array_map(function ($music){
            return [
              'artist' => $music->getArtist(),
              'name' => $music->getName(),
              'link' => $music->getLink()
            ];
        }, $this->musics);
    }
}


