<?php

use App\Http\Controllers\API\RelationshipController;
use App\Http\Controllers\API\CelebrantController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('relationship')->group(function () {
    Route::get('/', [RelationshipController::class, 'getAll']);
    Route::post('/', [RelationshipController::class, 'create']);
    Route::delete('/{id}', [RelationshipController::class, 'delete']);
    Route::get('/{id}', [RelationshipController::class, 'getById']);
    Route::put('/{id}', [RelationshipController::class, 'update']);
});

Route::prefix('celebrant')->group(function () {
    Route::get('/', [CelebrantController::class, 'getAll']);
    Route::post('/', [CelebrantController::class, 'create']);
    Route::delete('/{id}', [CelebrantController::class, 'delete']);
    Route::get('/{id}', [CelebrantController::class, 'getById']);
    Route::put('/{id}', [CelebrantController::class, 'update']);
});