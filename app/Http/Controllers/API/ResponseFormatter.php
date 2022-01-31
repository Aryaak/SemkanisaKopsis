<?php

namespace App\Http\Controllers\API;


class ResponseFormatter
{

    public static $response = [
        'meta' => [
            'status' => '',
            'code' => null,
            'message' => ''
        ]
    ];

    public static function success($message = '', $data = [])
    {
        self::$response['meta']['status'] = 'success';
        self::$response['meta']['code'] = 200;
        self::$response['meta']['message'] = $message;

        self::$response['data'] = $data;

        return self::$response;
    }

    public static function failed($message = '', $errors = [], $code = 500)
    {
        self::$response['meta']['status'] = 'success';
        self::$response['meta']['code'] = $code;
        self::$response['meta']['message'] = $message;

        self::$response['erros'] = $errors;

        return self::$response;
    }
}
