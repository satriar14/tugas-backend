<?php

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

Route::middleware(['auth:sanctum'])->group(function() {
    Route::get('/students', [App\Http\Controllers\Student::class, 'index']);
    Route::post('/students', [App\Http\Controllers\Student::class, 'store']);
    Route::get('/students/{id}', [App\Http\Controllers\Student::class, 'show']);
    Route::put('/students/{id}', [App\Http\Controllers\Student::class, 'update']);
    Route::delete('/students/{id}', [App\Http\Controllers\Student::class, 'destroy']);
});


//Auth API Token Sanctum
Route::post('/login', [App\Http\Controllers\Auth::class, 'login'])->name('login');