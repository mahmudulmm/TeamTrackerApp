<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\LocationController;
use App\Http\Controllers\Api\MettingController;
use App\Http\Controllers\Api\memberController;
use App\Http\Controllers\Api\ActivityController;
use App\Http\Controllers\api\productController;

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

Route::group([
    'middleware' => 'api',
    'namespace' => 'App\Http\Controllers',
    'prefix' => 'employee'

], function ($router) {

    Route::post('login', [AuthController::class,'login']);
    Route::post('logout', [AuthController::class,'logout']);
    Route::post('refresh', [AuthController::class,'refresh']);
    Route::post('me', [AuthController::class,'me']);

    //update location 
    Route::get('locations/employee', [LocationController::class,'locationget']);
    Route::post('save/locations', [LocationController::class,'locationsave']);

    Route::get('locations/all', [LocationController::class,'getallLocation']);

    Route::get('/get-status', [MettingController::class,'get_status']);

    Route::get('/list-meeting', [MettingController::class,'metting_list']);


  

    //Route::post('/save-metting', [MettingController::class,'set_metting']);

    // user group

    Route::get('/user/group', [MettingController::class,'user_group']);
    Route::post('/set/meeting', [MettingController::class,'set_metting']);
    Route::post('/update/meeting', [MettingController::class,'update_metting']);

    Route::get('group/members', [memberController ::class,'members_list']);

    Route::post('check/in', [ActivityController::class,'checkin']);

    Route::post('check/out', [ActivityController::class,'checkout']);

    //product Section
    Route::prefix('order')->group(function () {
        Route::get('get', [productController::class,'myorder']);
        
    });
    // Product 
    Route::get('/list-product', [productController::class,'product_list']);

    

});
