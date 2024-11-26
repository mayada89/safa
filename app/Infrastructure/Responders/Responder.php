<?php

namespace App\Infrastructure\Responders;

abstract class Responder
{
    protected $response;

    protected $data;

    protected $message;

    abstract public function respond();

    public function withResponse($response)
    {
        $this->response = $response;
        return $this;
    }

    public function withData($data = [])
    {
        $this->data = $data;
        return $this;
    }

    public function withMessage($message)
    {
        $this->message = $message;
        return $this;
    }
}
