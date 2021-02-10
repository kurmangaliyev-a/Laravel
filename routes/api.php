<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostApiController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get("data",[PostApiController::class,'getData']);
Route::get("post/getAllPosts",[PostApiController::class,'getAllPosts']);
Route::get("post/getPost/",[PostApiController::class,'getAllPosts']);
Route::get("post/getPost/{id}",[PostApiController::class,'getPost']);
Route::post("post/",[PostApiController::class,'addPost']);
Route::put("post/update/{id}",[PostApiController::class,'updatePost']);
Route::get("post/search/{str}",[PostApiController::class,'searchPost']);
Route::delete("post/delete/{id}",[PostApiController::class,'deletePost']);
