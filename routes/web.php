<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\LogedMiddleware;
use App\Http\Middleware\AuthenticatedMiddleware;
use App\Http\Controllers\WebAuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', function () {
    return view('auth.register');
})->middleware(LogedMiddleware::class);

Route::get('/login', function () {
    return view('auth.login');
})->middleware(LogedMiddleware::class);

Route::get('/dashboard', function(){
    return view('dashboard');
})->middleware(AuthenticatedMiddleware::class);

Route::post('/register', [WebAuthController::class, 'webRegister']);
Route::post('/login', [WebAuthController::class, 'webLogin']);
Route::post('/logout', [WebAuthController::class, 'logout'])->middleware(AuthenticatedMiddleware::class);
Route::get('/profile', [WebAuthController::class, 'profile'])->middleware(AuthenticatedMiddleware::class);

