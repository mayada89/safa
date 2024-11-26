<?php

namespace App\Infrastructure\Helpers\Traits;

use Symfony\Component\HttpFoundation\Response;

trait RESTApi
{

    /**
     * Return response with json object
     * @param $responseObject , $responseKey, $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendJson($responseObject, $statusCode = Response::HTTP_OK, $responseKey = 'response', $message = "")
    {

        if (request()->header('platform') && request()->header('platform') == 'web') {
            return response($responseObject, $statusCode);
        }
        $data['success'] = true;
        $data['data'] = $responseObject;


        if (!empty($message)) {
            $data['message'] = $message;
        }

        return response($data, $statusCode);
    }


    /**
     * Return response with error object
     * @param $errorObject , $errorKey, $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendError($errorObject, $statusCode = Response::HTTP_UNPROCESSABLE_ENTITY, $errorKey = 'error')
    {
        $errorResponse[$errorKey] = $errorObject;
        $errorResponse['success'] = false;

        return response($errorResponse, $statusCode);
    }

    public function sendRedirectError($errorObject, $statusCode = Response::HTTP_PERMANENTLY_REDIRECT, $errorKey = 'error')
    {
        return response($$errorObject, $statusCode);
    }

    public function sendMessage($responseObject, $statusCode = Response::HTTP_ACCEPTED, $responseKey = 'response')
    {
        return response($responseObject, $statusCode);
    }

}


