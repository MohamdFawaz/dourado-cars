<?php

if (!function_exists('getLocales')) {
    function getLocales()
    {
        $manager = app(\Barryvdh\TranslationManager\Manager::class);
        return $manager->getLocales();
    }
}

if (!function_exists('uploadImageFromRequest')) {
    function uploadImageFromRequest($request): string
    {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images/cars'), $imageName);
        return $imageName;
    }
}

if (!function_exists('reportException')) {
    function reportException(\Exception $exception)
    {

        // We are getting the directory so we can filter out any vendor code,
        // along with the directory.
        $dir = substr(__DIR__, 0, -14);
        $backtrace = $exception->getTraceAsString();
        $backtrace = str_replace([$dir], "", $backtrace);
        $backtrace = preg_replace('^(.*vendor.*)\n^', '', $backtrace);

        // And finally, we log the exception!
        \Log::error('@here' . PHP_EOL . ':warning: :x: :warning: :x: ' . PHP_EOL . '**Error:** ' . $exception->getMessage() . PHP_EOL . '**Line:** ' . $exception->getLine() . PHP_EOL . '**File:** ' . $exception->getFile() . PHP_EOL . '**Trace:**' . PHP_EOL . $backtrace);
    }

}
