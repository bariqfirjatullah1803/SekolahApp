<?php

use App\Http\Controllers\API\SekolahController;
use App\Http\Controllers\API\SiswaController;
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
// Route API Siswa
Route::apiResource('siswa',App\Http\Controllers\API\SiswaController::class);

// Route API Sekolah
Route::apiResource('sekolah',App\Http\Controllers\API\SekolahController::class);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Route::apiResource('sekolah',SekolahController::class);
