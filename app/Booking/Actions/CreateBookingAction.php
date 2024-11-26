<?php

namespace App\Booking\Actions;

use App\Booking\Domain\Requests\BookingRequest;
use App\Booking\Responders\BookingResponder;
use App\Booking\Domain\Services\CreateBookingService;

class CreateBookingAction
{
    public function __construct(BookingResponder $responder, CreateBookingService $service)
    {
        $this->responder = $responder;

        $this->service = $service;
    }

    public function __invoke(BookingRequest $request)
    {
        return $this->responder->withResponse(
            $this->service->handle($request->validated())
        )->respond();

    }
}
