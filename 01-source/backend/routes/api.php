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
Route::group(['prefix'=>'v1',],function(){
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

    Route::prefix('scores')->group(function () {
        /*
        |-------------------------------------------------------------------------------
        | 获取测试信息
        |-------------------------------------------------------------------------------
        | URL:            /api/v1/scores
        | Controller:     ScoreController
        | Method:         GET
        | Description:    获取测试信息
        */
        Route::get('/','ScoreController@findScore');
    });

    Route::prefix('scores')->group(function () {
        /*
        |-------------------------------------------------------------------------------
        | 获取测试信息
        |-------------------------------------------------------------------------------
        | URL:            /api/v1/scores/{student_id}
        | Controller:     ScoreController
        | Method:         GET
        | Description:    获取测试信息
        */
        Route::get('/{stuId}','ScoreController@findScoreBySId');
    });

    Route::prefix('scores')->group(function () {
        /*
        |-------------------------------------------------------------------------------
        | 获取测试信息
        |-------------------------------------------------------------------------------
        | URL:            /api/v1/scores/{student_id}/{paper_id}/{score}
        | Controller:     ScoreController
        | Method:         POST
        | Description:    获取测试信息
        */
        Route::get('/{stuId}/{papId}/{Score}','ScoreController@addScore');
    });

    Route::prefix('analyses')->group(function () {
        /*
        |-------------------------------------------------------------------------------
        | 获取测试信息
        |-------------------------------------------------------------------------------
        | URL:            /api/v1/analyses
        | Controller:     AnalyseController
        | Method:         GET
        | Description:    获取测试信息
        */
        Route::get('/','AnalyseController@findAnalyse');
    });

    Route::prefix('analyses')->group(function () {
        /*
        |-------------------------------------------------------------------------------
        | 获取测试信息
        |-------------------------------------------------------------------------------
        | URL:            /api/v1/analyses/{student_id}
        | Controller:     AnalyseController
        | Method:         GET
        | Description:    获取测试信息
        */
        Route::get('/{stuId}','AnalyseController@findAnalyseBySId');
    });

    Route::prefix('records')->group(function () {
        /*
        |-------------------------------------------------------------------------------
        | 获取测试信息
        |-------------------------------------------------------------------------------
        | URL:            /api/v1/records
        | Controller:     RecordController
        | Method:         GET
        | Description:    获取测试信息
        */
        Route::get('/','RecordController@findRecord');
    });

    Route::prefix('records')->group(function () {
        /*
        |-------------------------------------------------------------------------------
        | 获取测试信息
        |-------------------------------------------------------------------------------
        | URL:            /api/v1/records/{student_id}
        | Controller:     RecordController
        | Method:         GET
        | Description:    获取测试信息
        */
        Route::get('/{stuId}','RecordController@findRecordBySId');
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