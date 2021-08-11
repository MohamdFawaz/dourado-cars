<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function errorJsonResponse($exception, $message = "")
    {
        if ($exception instanceof \Exception) {
            reportException($exception);
        }
        return response()->json(['error' => $message ? $message : 'Something Went Wrong'], 403);
    }
}
