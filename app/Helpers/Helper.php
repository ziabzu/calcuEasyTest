<?php

namespace App\Helpers;

class Helper
{

    /**
     * used for json to send Response
     */
    public static function sendResponse($result, $message)
    {
        $response = [
            'success' => true,
            'data' => $result,
            'message' => $message,
        ];
        return response()->json($response, 200);
    }


    /**
     * used for json to send Error response
     */
    public static function sendError($error, $errorMessages = [], $code = 404)
    {

        $response = [
            'success' => false,
            'message' => $error,
        ];

        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }

        return response()->json($response, $code);

    }

}
