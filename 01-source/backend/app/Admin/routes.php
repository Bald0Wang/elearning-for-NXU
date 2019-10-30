<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    $router->resource('/actions', 'ActionController');
    $router->resource('/actiontypes', 'ActionTypeController');    
    $router->resource('/blocks', 'BlockController');
    $router->resource('/blockinsts', 'BlockInstController');
    $router->resource('/blockinstindexdatas', 'BlockInstIndexDataController');
    $router->resource('/categories', 'CategoryController');
    $router->resource('/gardens', 'GardenController');
    $router->resource('/indexs', 'IndexController');
    $router->resource('/locations', 'LocationController');
    $router->resource('/plants', 'PlantController');
    $router->resource('/plantindexdatas', 'PlantIndexDataController');
    $router->resource('/plantinsts', 'PlantInstController');
    $router->resource('/plantinstindexdatas', 'PlantInstIndexDataController');
    $router->resource('/equiptypes', 'EquipTypeController');
    $router->resource('/equipments', 'EquipmentController');
    $router->resource('/equipnodes', 'EquipNodeController');
    $router->resource('/equipcommands', 'EquipCommandController');
    $router->resource('/sensordatas', 'SensorDataController');
    $router->resource('/shelves', 'ShelfController');
    $router->resource('/equipshelves', 'EquipShelfController');
    $router->resource('/users', 'UserController');
    $router->resource('/equipmentaction', 'EquipmentActionController');

    // upload excel route
    $router->get('excel/upload','UpexcelController@upload');
    $router->post('excel/upload','UpexcelController@upload');

    // upload UserInfo route
    $router->get('userinfo/upload','UpUserInfoController@upload');
    $router->post('userinfo/upload','UpUserInfoController@upload');
});
