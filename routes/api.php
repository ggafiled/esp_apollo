<?php

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    Log::debug('User:' . serialize($request->user()));
    return $request->user();
});

Route::namespace('App\\Http\\Controllers\\API\V1')->group(function () {

    Route::get('profile', 'ProfileController@profile');
    Route::put('profile', 'ProfileController@updateProfile');
    Route::get('role/list', 'RoleController@list');
    Route::post('backup/actionBackup', 'BackupController@actionBackup');
    Route::post('change-password', 'ProfileController@changePassword');
    Route::get('permission/list', 'PermissionController@list');

    Route::apiResources([
        'release' => 'ReleaseController',
        'provider' => 'ProviderController',
        'user' => 'UserController',
        'role' => 'RoleController',
        'permission' => 'PermissionController',
        'dashboard' => 'DashboardController',
        'backup' => 'BackupController',
        'logs' => 'LogsController',
    ]);
});