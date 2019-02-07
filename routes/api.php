<?php

use Illuminate\Http\Request;

/* design pattern - Facade
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

Route::group(['namespace' => 'Api'], function(){
    Route::name('api.login')->post('login', 'AuthController@login');
    Route::post('refresh', 'AuthController@refresh');


    Route::group(['middleware' => ['auth:api']], function () {
        Route::post('logout', 'AuthController@logout');

        Route::group(['middleware' => 'jwt.refresh'], function () {
//        Route::get('users', function () {
//            return \App\Models\User::all();
//        });
            Route::get('categories/{category}/bill_pays', 'CategoryBillPayController@index');
            Route::resource('categories', 'CategoryController', ['except' => ['create', 'edit']]);
            Route::resource('bill_pays', 'BillPayController', ['except' => ['create', 'edit']]);
        });

    });
});
