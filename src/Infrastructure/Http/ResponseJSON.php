<?php

namespace Weather\Api\Infrastructure\Http;

use Slim\Http\StatusCode;

class ResponseJSON
{

    /**
     * @var int
     */
    private $code;

    /**
     * @var array
     */
    private $body;

    public function __construct($code, array $body)
    {
        $this->code = $code;
        $this->body = $body;
    }

    public function toArray()
    {
        $this->body['code'] = $this->code;
        return $this->body;
    }

    public static function createNotFoundError($message)
    {
        return new self(StatusCode::HTTP_NOT_FOUND, ['message' => $message]);
    }

    public static function createSuccess($message)
    {
        return new self(StatusCode::HTTP_OK, ['message' => $message]);
    }
}
