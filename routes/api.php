<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AssetAssignmentController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\VendorsHasobController;
use App\Http\Controllers\UsersController;

use App\Http\Controllers\AuthController;

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

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], 

function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);    
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('asset-assignments', AssetAssignmentController::class);
Route::resource('assets', AssetController::class);

Route::resource('users', UsersController::class);

Route::resource('vendors', VendorsHasobController::class);

