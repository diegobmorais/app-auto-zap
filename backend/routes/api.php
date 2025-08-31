<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\CmsSettingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/me', [AuthController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'logout']);
});
// Route::middleware(['auth:sanctum', 'role:admin'])->group(function () {
//     Route::get('/users', [UserController::class, 'index']);
// });
Route::prefix('cms')->group(function () {
    Route::get('/banner', action: [CmsSettingController::class, 'banner']);
    // Protegido: só admin
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/banner', [CmsSettingController::class, 'updateBanner']);
    });
});
