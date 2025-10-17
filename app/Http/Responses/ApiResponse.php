<?php

namespace App\Http\Responses;

use Illuminate\Http\JsonResponse;

class ApiResponse
{
   public static function success(string $message = '', int $statusCode = 200, array $data = []): JsonResponse
   {
      return response()->json([
         'message' => $message,
         'data' => $data,
      ], $statusCode);
   }

   public static function error(string $message = '', int $statusCode = 500, array $errors = []): JsonResponse
   {
      return response()->json([
         'message' => $message,
         'errors' => $errors,
      ], $statusCode);
   }
}
