<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function successReqonse($data,$message) {
        return response()->json([
            'error' => false,
            'message' => $message,
            'data' => $data,
        ]);
    }

    public function errorResponse($message, $data = []) {
        return response()->json([
            'error' => true,
            'message' => $message,
            'data' => $data,
        ]);
    }
}
