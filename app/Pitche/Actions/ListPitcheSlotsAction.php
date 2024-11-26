<?php

namespace App\Pitche\Actions;

use App\Pitche\Domain\Requests\AvailableSlotsRequest;
use App\Pitche\Domain\Services\ListPitcheSlotsService;
use App\Pitche\Responders\PitcheResponder;

class ListPitcheSlotsAction
{
    public function __construct(PitcheResponder $responder, ListPitcheSlotsService $service)
    {
        $this->responder = $responder;

        $this->service = $service;
    }

    public function __invoke(AvailableSlotsRequest $request, $id)
    {
        return $this->responder->withResponse(
            $this->service->handle($request->validated(), $id)
        )->respond();

    }
}
