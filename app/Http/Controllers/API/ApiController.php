<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    protected function safeCall(callable $callback)
    {
        try {
            return $callback();
        } catch (\Throwable $e) {
            \Log::error($e);
            return response()->json([
                'message' => 'Something went wrong. Pleas try again later',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
