<?php

use Illuminate\Support\Facades\Route;

Route::get('/{any}', function () {
    $file = public_path('build/index.html');

    if (file_exists($file)) {
        return response()->file($file);
    }

    return response('', 200); // Empty response, status 200
})->where('any', '.*');
