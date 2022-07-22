<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UsersApiController;

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

// Configurasi API Android
Route::get('biodata', [UsersApiController::class, 'index']);
Route::get('biodata/allusers', [UsersApiController::class, 'biodatauser']);
Route::post('biodata/insert_biodata', [UsersApiController::class, 'insert_data_biodata']);
Route::post('biodata/update_biodata/{id}', [UsersApiController::class, 'update_data_biodata']);
Route::delete('biodata/delete_biodata/{id}', [UsersApiController::class, 'delete_data_product']);
