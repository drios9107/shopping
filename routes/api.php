<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ShoeController;
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

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});

Route::group(['middleware' => ['auth:api']], function () {
    Route::resource('shoes', ShoeController::class);
    Route::get('carts', [CartController::class, 'index']);
    Route::get('/carts/is_mounted', [CartController::class, 'is_mounted'])->name('is_mounted');
    Route::get('/carts/{id}/pay', [CartController::class, 'pay'])->name('pay');
    Route::get('/carts/{id}/delete', [CartController::class, 'delete'])->name('delete');
    Route::get('/carts/clean', [CartController::class, 'clean'])->name('clean');
    Route::get('/carts/{id}/add', [CartController::class, 'add'])->name('add');
});
