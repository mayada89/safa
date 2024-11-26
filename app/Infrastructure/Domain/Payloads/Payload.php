<?php

namespace App\Infrastructure\Domain\Payloads;

abstract class Payload
{
    protected $data = [];

    protected $status = 200;
    protected $message = "";

    public function __construct($data = null, $status = null, $message = "")
    {
        $this->data = $data;

        if (isset($message)) {
            $this->message = $message;
        }

        if (isset($status)) {
            $this->status = $status;
        }
    }

    public function getData()
    {
        return $this->data;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getMessage()
    {
        return $this->message;
    }

}
