<?php

namespace App\Pitche\Domain\Requests;

use App\Infrastructure\Http\Requests\API\CustomApiRequest;

class AvailableSlotsRequest extends CustomApiRequest
{
    public function rules()
    {
        switch ($this->method()) {
            case 'GET':
            case 'DELETE':
                return [];

            case 'POST':
                $rules = [
                    'period' => 'required|in:60,90',
                    'date' => 'required|after_or_equal:' . now()->format('Y-m-d'),
                ];
                return $rules;
            case 'PUT':
            case 'PATCH':

                return [

                ];
        }
    }

}
