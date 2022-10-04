<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


Route::get('/', [AuthController::class, "register"]);
Route::get('/reg', [AuthController::class, "register_view"]);
Route::post('/reg', [AuthController::class, "register"])
    ->name("register-store");
