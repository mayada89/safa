<?php

namespace App\Booking\Domain\Resources;

use App\Infrastructure\Domain\Resources\GenericNameResource;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class BookingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'mobile' => $this->mobile,
            'booking_date' => $this->booking_date,
            'start_time' => Carbon::parse($this->start_time)->format('g:i A'),
            'end_time' => Carbon::parse($this->end_time)->format('g:i A'),
            'pitche' => new GenericNameResource($this->pitche),
            'created_at' => Carbon::parse($this->created_at)->translatedFormat('d M Y'),
        ];
    }
}
