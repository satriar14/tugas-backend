<?php

use App\Http\Controllers\Auth;
use App\Http\Controllers\Patient;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/patients')->middleware('auth:sanctum')->group(function () {
    Route::get('/', [Patient::class, 'index']);
    Route::post('/', [Patient::class, 'store']);
    Route::get('/{id}', [Patient::class, 'show']);
    Route::put('/{id}', [Patient::class, 'update']);
    Route::delete('/{id}', [Patient::class, 'destroy']);
    Route::get('/search/{name}', [Patient::class, 'search']);
    Route::get('/status/{conition}', [Patient::class, 'status']);
});

//Auth API Token Sanctum
Route::post('/login', [Auth::class, 'login'])->name('login');
Route::post('/register', [Auth::class, 'register'])->name('register');
