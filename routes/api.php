<?php

use Illuminate\Support\Facades\Route;
use Jazer\Branches\Http\Controllers\SignOut\SignOut;
use Jazer\Branches\Http\Controllers\Fetch\Paginate;
use Jazer\Branches\Http\Controllers\Fetch\Single;
use Jazer\Branches\Http\Controllers\Delete\Delete;
use Jazer\Branches\Http\Controllers\Update\Flexible;
use Jazer\Branches\Http\Controllers\Create\CreateBranch;

Route::group(['prefix' => 'api'], function () {
    Route::group(['prefix' => 'branches'], function () {
        Route::get('single/{branch_refid}', [Single::class, 'single']);
        Route::get('paginate', [Paginate::class, 'paginate']);
        Route::get('delete/{branch_refid}', [Delete::class, 'delete']);
        Route::get('updateflexible', [Flexible::class, 'update']);
        Route::get('createbranch', [CreateBranch::class, 'create']);
    });
});

