<?php

namespace App\Pitche\Responders;

use App\Infrastructure\Helpers\Traits\RESTApi;
use App\Infrastructure\Responders\Responder;
use App\Infrastructure\Responders\ResponderInterface;
use App\Pitche\Domain\Resources\PitcheResource;

class PitcheResponder extends Responder implements ResponderInterface
{
    use RESTApi;

    public function respond()
    {
        if ($this->response->getStatus() == 201) {
            return $this->sendJson(
                new PitcheResource($this->response->getData()),
                $this->response->getStatus()
            );
        }

        if ($this->response->getStatus() == 200) {
            return $this->sendJson(
                PitcheResource::collection($this->response->getData()),
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
