<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\ThreadController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;




Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'Login']);

Route::post('/add', [ThreadController::class, 'addThread']);
Route::get('/threadList', [ThreadController::class, 'threadList']);
Route::get('/detail/{id}', [ThreadController::class, 'threadDetails']);
Route::post('/addComment', [CommentController::class, 'addComment']);
Route::get('/commentList/{id}', [CommentController::class, 'commentList']);
Route::put('/update/{id}', [CommentController::class, 'update']);
Route::delete('/delete/{id}', [CommentController::class, 'delete']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
