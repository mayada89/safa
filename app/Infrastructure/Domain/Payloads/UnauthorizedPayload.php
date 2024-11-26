<?php
namespace App\Infrastructure\Domain\Payloads;

class UnauthorizedPayload extends Payload
{

    protected $status = 401;
    protected $data = ['error' => 'Invalid authorized!' , 'success' => false];
}
