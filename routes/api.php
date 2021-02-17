<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use Dingo\Api\Routing\Router;

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

/** @var Router $api */
$api = app(Router::class);

$api->version('v1', function (Router $api) {
    $api->group(['prefix' => 'message'], function (Router $api) {
        $api->post('add',  'App\\Api\\V1\\Controllers\\MessageController@add');
        $api->get('list',  'App\\Api\\V1\\Controllers\\MessageController@list');
        $api->post('check', 'App\\Api\\V1\\Controllers\\MessageController@check');
    });
});
