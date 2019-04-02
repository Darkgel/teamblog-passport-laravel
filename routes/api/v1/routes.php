<?php
/**
 * Created by PhpStorm.
 * User: Darkgel
 * Date: 2018/12/29
 * Time: 15:38
 */

use Dingo\Api\Routing\Router;

/** @var Dingo\Api\Routing\Router $api*/
$api->version('v1', ['namespace' => 'App\Api\Controllers\V1', 'middleware' => ['api.common']], function (Router $api) {
    $api->group(['namespace' => 'Authorization', 'prefix' => 'authorization'], function (Router $api){
        $api->group(['prefix' => 'permissions'], function (Router $api){
            $api->get('/', 'PermissionController@index');
            $api->get('{id}', 'PermissionController@detail');
            $api->post('/', 'PermissionController@save');
        });

        $api->group(['prefix' => 'roles'], function (Router $api){
            $api->get('/', 'RoleController@index');
            $api->get('{id}', 'RoleController@detail');
            $api->post('/', 'RoleController@save');
        });
    });
});
