<?php

namespace App\Booking\Domain\Requests;

use App\Infrastructure\Http\Requests\API\CustomApiRequest;

class BookingRequest extends CustomApiRequest
{
    public function rules()
    {
        switch ($this->method()) {
            case 'GET':
            case 'DELETE':
                return [];

            case 'POST':
                $rules = [
                    'pitche_id' => 'required',
                    'name' => 'required|min:3|max:100',
                    'mobile' => 'required|numeric',
                    'booking_date' => 'required|after_or_equal:' . now()->format('Y-m-d'),
                    'start_time' => 'required|date_format:H:i',
                    'end_time' => 'required|date_format:H:i',
                ];
                return $rules;
            case 'PUT':
            case 'PATCH':

                return [

                ];
        }
    }

}
