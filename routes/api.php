<?php

use App\Http\Controllers\api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// PUBLIC ROUTES
Route::post('/signup', [UserController::class, 'signup']);
Route::post('/login', [UserController::class, 'login']);

// PRIVATE ROUTES
Route::group(['middleware' => ['auth:sanctum']], function () {

    /**
     * Resource for authenticated users only
     */
    Route::get('/testing', function(){
        return 'TEST!!!';
    });


     Route::delete('/logout', [UserController::class, 'logout']);
});
