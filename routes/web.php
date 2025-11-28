<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\LogedMiddleware;
use App\Http\Middleware\AuthenticatedMiddleware;
use App\Http\Controllers\WebAuthController;

Route::get('/', function () {
    return view('welcome');
});

/*
Route::post('/logout', [WebAuthController::class, 'logout'])->middleware(AuthenticatedMiddleware::class);
Route::get('/profile', [WebAuthController::class, 'profile'])->middleware(AuthenticatedMiddleware::class);
*/

Route::get("/login", [WebAuthController::class, "showLogin"]);
Route::post("/login", [WebAuthController::class, "login"]);
Route::post("/logout", [WebAuthController::class, "logout"]);

Route::middleware("auth")->group(function(){
    Route::get("/admin/home", function(){
        return view("admin.home");
    })->name("admin.home");

       Route::get("/teacher.home", function(){
        return view("teacher.home");
    })->name("teacher.home");

   Route::get("/student/home", function(){
        return view("student.home");
    })->name("student.home");

   Route::get("/parent/home", function(){
        return view("parent.home");
    })->name("parent.home");

});