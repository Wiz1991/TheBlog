<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\TagController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('tags', [TagController::class, 'index']);

Route::prefix('articles')->group(function () {
    Route::get('/', [ArticleController::class, 'index']);
    Route::get('{article}', [ArticleController::class, 'show']);
});

Route::middleware('auth')->group(function () {

    Route::prefix('articles')->group(function () {
        Route::post('/', [ArticleController::class, 'store']);
        Route::put('{article}', [ArticleController::class, 'update']);
        Route::delete('{article}', [ArticleController::class, 'destroy']);
    });

});