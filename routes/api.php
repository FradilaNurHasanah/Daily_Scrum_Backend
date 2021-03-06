<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('register', 'UserController@register');
Route::post('login', 'UserController@login');

Route::group(['middleware' => ['jwt.verify']], function () {
    Route::get('login/check', "UserController@LoginCheck"); //cek token
    Route::post('logout', "UserController@logout"); //cek token
    
    Route::post('/dailyscrum', 'Daily_ScrumController@store');
    Route::delete('/dailyscrum/{id}', "Daily_ScrumController@destroy");
    Route::get('/dailyscrum/{id}', "Daily_ScrumController@index");
});
