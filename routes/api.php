<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'prefix' => 'items',
], function () {
    Route::get('/', 'ItemController@index');
    Route::post('/', 'ItemController@store');
    Route::put('/{id}', 'ItemController@update');
    Route::delete('/{id}', 'ItemController@destroy');
});
