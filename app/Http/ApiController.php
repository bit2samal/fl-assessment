<?php

namespace App\Http;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class ApiController extends Controller
{

    public function jsonResponse(
        int $status_code,
        bool $success = true,
        string $message = '',
        object|array $data = null
    ): JsonResponse {
        return response()->json([
                                    'message' => $message,
                                    'success' => $success,
                                    'status' => $status_code,
                                    'data' => $data
                                ]);
    }
}
