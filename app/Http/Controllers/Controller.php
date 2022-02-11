<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Respond with model created response.
     *
     * @param string $model
     * @return JsonResponse
     * @throws BindingResolutionException
     */
    protected function respondModelCreated(string $model): JsonResponse
    {
        return response()->json([
            'message' => "{$model} created successfully",
        ], Response::HTTP_CREATED);
    }

    /**
     * Respond with model updated response.
     *
     * @param string $model
     * @return JsonResponse
     * @throws BindingResolutionException
     */
    protected function respondModelUpdated(string $model): JsonResponse
    {
        return response()->json([
            'message' => "{$model} updated successfully",
        ], Response::HTTP_OK);
    }

    /**
     * Respond with model deleted response.
     *
     * @param string $model
     * @return JsonResponse
     * @throws BindingResolutionException
     */
    protected function respondModelDeleted(string $model): JsonResponse
    {
        return response()->json([
            'message' => "{$model} deleted successfully",
        ], Response::HTTP_OK);
    }
}
