<?php

namespace App\Booking\Responders;

use App\Booking\Domain\Resources\BookingResource;
use App\Infrastructure\Helpers\Traits\RESTApi;
use App\Infrastructure\Responders\Responder;
use App\Infrastructure\Responders\ResponderInterface;

class BookingResponder extends Responder implements ResponderInterface
{
    use RESTApi;

    public function respond()
    {
        if ($this->response->getStatus() == 201) {
            return $this->sendJson(
                new BookingResource($this->response->getData()),
                $this->response->getStatus()
            );
        }

        if ($this->response->getStatus() == 200) {
            return $this->sendJson(
                BookingResource::collection($this->response->getData()),
                $this->response->getStatus()
            );
        }

        if ($this->response->getStatus() == 204) {
            return $this->response->getData();
            // return $this->sendJson($this->response->getData(), $this->response->getStatus());
        }

        return $this->sendError($this->response->getData());

    }
}
