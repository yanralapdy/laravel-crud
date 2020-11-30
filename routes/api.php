<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\ItemController;

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
// Route::prefix('v1')-> group(function () {
//     Route::apiResource('items', ItemController::class);
// });

Route::group(['prefix' => 'v1'], function () {
    Route::apiResource('items', ItemController::class);
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// create a user route
Route::get('users-create', function () {
    \App\Models\User::create([
        'name' => 'apdy',
        'email' => 'omyanral@gmail.com',
        'password' => Hash::make('1234')
    ]);
});

// login route

// Logout a user
