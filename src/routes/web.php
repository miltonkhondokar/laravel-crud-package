<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Ayat\Crud\Http\Controllers\CrudController;

Route::group(['namespace' => 'Ayat\Crud\Http\Controllers', 'middleware' => ['web'], 'prefix'=>'package','as'=>'package.'], function(){

    Route::get('/',                                      [CrudController::class, 'index']);
    Route::get('create',                                 [CrudController::class, 'create']);
    Route::post('store',                                 [CrudController::class, 'store']);
    Route::get('edit/{id}',                              [CrudController::class, 'edit']);
    Route::post('update',                                [CrudController::class, 'update']);
    Route::post('delete',                                [CrudController::class, 'destroy']);
});
