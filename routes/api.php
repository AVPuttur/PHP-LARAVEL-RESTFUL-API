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

Route::get('students', 'Api\StudentController@index');

Route::get('students/{id}', 'Api\StudentController@show');

Route::post('students', 'Api\StudentController@store');

Route::put('students/{id}', 'Api\StudentController@update');

Route::delete('students/{id}', 'Api\StudentController@destroy');