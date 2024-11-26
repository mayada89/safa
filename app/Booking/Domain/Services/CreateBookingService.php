<?php

namespace App\Booking\Domain\Services;

use App\Booking\Domain\Models\Booking;
use App\Infrastructure\Domain\Payloads\GenericPayload;
use App\Infrastructure\Domain\Services\Service;
use App\Pitche\Domain\Models\Pitche;
use Carbon\Carbon;

class CreateBookingService extends Service
{

    public $booking;
    public function __construct(Booking $booking)
    {
        $this->booking = $booking;
    }

    /*
     * Method create new booking & render booking details
     */

    public function handle($data = [])
    {
        try {
            Pitche::findOrFail($data['pitche_id']);

        } catch (\Exception $ex) {

            return new GenericPayload($ex->getMessage(), 422);
        }

        //---- Check overbooking ---
        $startTime = Carbon::parse($data['start_time'])->addMinute()->format('H:i:s');

        $checkBooked = Booking::where('pitche_id', $data['pitche_id'])
            ->where('booking_date', $data['booking_date'])
            ->whereRaw('? between start_time and end_time', [$startTime])
            ->count();

        if ($checkBooked > 0) {
            return new GenericPayload(__('error.Time not available'), 422);
        }

        //--- If pitche not booked ------
        $booking = Booking::create($data);

        return new GenericPayload($booking, 201);
    }

}
