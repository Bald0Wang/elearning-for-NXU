<?php

use Illuminate\Http\Request;

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
    return $request->user();
});

//需要token验证的接口
Route::group(['prefix'=>'v1','middleware'=>'jwt.auth'],function(){
    /*
    |-------------------------------------------------------------------------------
    | 测试接口组
    |-------------------------------------------------------------------------------
    */
    Route::prefix('tests')->group(function () {
        /*
        |-------------------------------------------------------------------------------
        | 获取测试信息
        |-------------------------------------------------------------------------------
        | URL:            /api/v1/tests
        | Controller:     
        | Method:         GET
        | Description:    获取测试信息
        */
        Route::get('/','TestsController@tests');
    });
});

Route::group([

    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});