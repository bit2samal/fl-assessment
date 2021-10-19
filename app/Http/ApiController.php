<?php

namespace App\Http;

use Illuminate\Http\JsonResponse;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class ApiController extends BaseController
{
    use AuthorizesRequests;
    use DispatchesJobs;
    use ValidatesRequests;

    public function sendResponse(
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
