<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::middleware(["guest"])->group(function() {
    Route::get('/', [AuthController::class, "index"])->name("index");
    Route::get('/reg', [AuthController::class, "register_view"]);
    Route::post('/reg', [AuthController::class, "register"])
        ->name("register-store");
    Route::post('/login', [AuthController::class, "login"])
        ->name("login-store");
});

Route::middleware(["isVerified", "guest"])->group(function() {
    Route::get('/verify', [AuthController::class, "verify_view"])
        ->name("verify-view");
    Route::post('/verify', [AuthController::class, "verify"])
        ->name("verify");
});

Route::middleware(["auth"])->group(function() {
    Route::get("/dashboard", function() {
        return view("dash.index");
    })->name("dashboard");
    Route::get("/logout", [AuthController::class, "logout"])
        ->name("logout");

    Route::resource("categories", CategoryController::class);


    //Product
    Route::prefix("/products")->group(function() {
        Route::get("/", [ProductController::class, "index"])->name("all-products");
        Route::get("/create", [ProductController::class, "create"])->name("create-product");
        Route::post("/create", [ProductController::class, "store"])->name("store-product");
    });
});

