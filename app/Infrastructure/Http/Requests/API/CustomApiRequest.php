<?php

namespace App\Infrastructure\Http\Requests\API;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CustomApiRequest extends FormRequest
{

    //---- Handle response in case of validation failed
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'error' => $validator->errors()->first(),
                'success' => false,
            ], 422)
        );
    }

}
