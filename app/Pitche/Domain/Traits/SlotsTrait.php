<?php

namespace App\Pitche\Domain\Traits;

use App\Booking\Domain\Models\Booking;
use App\Pitche\Domain\Models\Pitche;
use Carbon\Carbon;
use Label84\HoursHelper\Facades\HoursHelper;

trait SlotsTrait
{
    /**
     * Used Carbon hours helper to get intervals within the specific period.
     * Pass opening & closing time for given pitche
     */

    public function getSlots($data, $pitche_id)
    {
        $pitche = Pitche::findOrFail($pitche_id);
        $hours = HoursHelper::create($pitche->opening_time, $pitche->closing_time, $data['period']);

        $slots = $this->periodIntervals($hours, $data, $pitche_id);
        return $slots;
    }

    /**
     * Render available time slots for given pitche
     */
    public function periodIntervals($hours = [], $data, $pitche_id)
    {
        $slots = [];
        $period = $data['period'] ?? 60;

        $bookings = $this->excludeBookings($pitche_id, $data['date']);

        foreach ($hours as $hour) {
            $myTime = Carbon::parse($hour);
            // $slots[] = $myTime->format('g:i A') . ' : ' . $myTime->addMinutes((int) $period)->format('g:i A');
            if (!in_array($myTime->format('H:i:s'), $bookings)) {
                $slots[] = $myTime->format('H:i') . ' : ' . $myTime->addMinutes((int) $period)->format('H:i');
            }
        }

        return $slots;
    }

    /**
     * Exclude bookings on the given date
     */

    public function excludeBookings($pitche_id, $booking_date)
    {
        $bookings = Booking::where('pitche_id', $pitche_id)
            ->where('booking_date', $booking_date)
            ->pluck('start_time')
            ->toArray();

        return $bookings;
    }

}
