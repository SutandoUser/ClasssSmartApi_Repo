<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\StudentGroupController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//Route para UserController
Route::prefix('users')->group(function () {

Route::get('/', [UserController::class, 'readAll']);
Route::post("/create", [UserController::class, "create"]);
Route::get("/{id}", [UserController::class, "readOne"]);
Route::put("/{id}", [UserController::class, "update"]);
Route::delete("/{id}", [UserController::class, "delete"]);
});

//Route para GroupController
Route::prefix("groups")->group(function(){
Route::get("/", [GroupController::class, "readAll"]);
Route::post("/create", [GroupController::class, "create"]);
Route::get("/{id}", [GroupController::class, "readOne"]);
Route::put("/{id}", [GroupController::class, "update"]);
Route::delete("/{id}", [GroupController::class, "delete"]);
});

//Route para StudentGroupController
Route::prefix("student-groups")->group(function(){
Route::get("/", [StudentGroupController::class, "readAll"]);
Route::post("/create", [StudentGroupController::class, "create"]);
Route::get("/{id}", [StudentGroupController::class, "readOne"]);
Route::put("/{id}", [StudentGroupController::class, "update"]);
});