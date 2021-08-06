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
            $this->report($exception);
        }
        return response()->json(['error' => $message ? $message : 'Something Went Wrong'], 403);
    }

    public function report(\Exception $exception)
    {

        // We are getting the directory so we can filter out any vendor code,
        // along with the directory.
        $dir = substr(__DIR__,0,-14);
        $backtrace =  $exception->getTraceAsString();
        $backtrace = str_replace([$dir],"", $backtrace);
        $backtrace = preg_replace('^(.*vendor.*)\n^','',$backtrace);

        // And finally, we log the exception!
        \Log::error('@here'.PHP_EOL.':warning: :x: :warning: :x: ' . PHP_EOL . '**Error:** '.$exception->getMessage() . PHP_EOL. '**Line:** ' . $exception->getLine() . PHP_EOL. '**File:** '. $exception->getFile() . PHP_EOL . '**Trace:**'.PHP_EOL. $backtrace);
    }
}
