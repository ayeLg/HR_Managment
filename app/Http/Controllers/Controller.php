<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function successResponse($data, $message)
    {
        return response()->json([
            "error" => true,
            "message" => $message,
            "data" => $data,
        ]);
    }


    public function errorResponse($message, $data = [])
    {
        return response()->json([

            'error' => true,
            'message' => $message,
            'data' => $data,

        ]);
    }
}
