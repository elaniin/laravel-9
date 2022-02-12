<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\PostStatusController;
use App\Http\Controllers\UserController;
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

Route::controller(UserController::class)->prefix('users')->middleware(['api', 'auth'])->group(function () {
    // We know we can use Route::resource(), but we're demonstrating Route::controller().
    // So 😅
    Route::get('/', 'index');
    Route::get('/{user}', 'show');
    Route::post('/', 'store');
    Route::patch('/{user}', 'update');
    Route::delete('/{user}', 'destroy');

    // Scope bindings.
    Route::get('/{user}/posts/{post:id}', 'showPost')->scopeBindings();
});

Route::apiResource('posts', PostController::class)->middleware(['api', 'auth']);

Route::get('post-status/{status}', [PostStatusController::class, 'show']);
