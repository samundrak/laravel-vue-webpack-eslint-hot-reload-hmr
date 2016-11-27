<?php

/**
 * @param array $errorDetails
 * @param string $message
 * @param int $httpStatus
 * @return \Illuminate\Http\JsonResponse
 */
function api_error($message = '', $errorDetails = [], $httpStatus = 500)
{
    return response()
        ->json([
            'success' => 0,
            'message' => collect($message)->values()->flatten(),
            'data' => $errorDetails
        ], $httpStatus);
}

/**
 * @param string $message
 * @param array $successDetails
 * @param int $httpStatus
 * @return \Illuminate\Http\JsonResponse
 */
function api_success($message = '', $successDetails = [], $httpStatus = 200)
{
    return response()
        ->json([
            'success' => 1,
            'message' => $message,
            'data' => $successDetails,
        ], $httpStatus);
}