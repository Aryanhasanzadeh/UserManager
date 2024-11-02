<?php

namespace App\Parents\Controller;

use App\Traits\RespondApi;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

abstract class ParentController
{
    use AuthorizesRequests, ValidatesRequests;
    use RespondApi;

    public function handleFailedException(\Exception $e): JsonResponse
    {
        DB::rollBack();

        Log::error($e->getMessage());

        return $this->responseError(trans('messages.failed'), Response::HTTP_EXPECTATION_FAILED);
    }
}
