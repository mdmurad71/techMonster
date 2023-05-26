<?php

use App\Http\Controllers\ThreadController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;




Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'Login']);

Route::post('/add', [ThreadController::class, 'addThread']);



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
