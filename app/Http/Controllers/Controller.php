<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function successResponse($message = "success", $data = [])
    {
        return response()->json([
            'message' => $message,
            'data' => $data
        ]);
    }
}
