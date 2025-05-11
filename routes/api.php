<?php

use Illuminate\Support\Facades\Route;
use Jazer\Users\Http\Controllers\SignOut\SignOut;
use Jazer\Users\Http\Controllers\Fetch\Paginate;
use Jazer\Users\Http\Controllers\Fetch\Single;
use Jazer\Users\Http\Controllers\Delete\Delete;

Route::group(['prefix' => 'api'], function () {
    Route::group(['prefix' => 'branches'], function () {
        Route::get('ok', function () {
            echo "Connected";
        });
    });
});

