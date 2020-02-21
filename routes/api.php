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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/lawyerLogin',"RegisterController@lawyerLogin")->middleware('api');
Route::post('/clientLogin',"RegisterController@clientLogin")->middleware('api');
Route::post('/adminLogin',"RegisterController@adminLogin")->middleware('api');

Route::post('/lawyer_register',"RegisterController@lawyer")->middleware('api');
Route::post('/client_register',"RegisterController@client")->middleware('api');
Route::post('/admin_register',"RegisterController@admin")->middleware('api');

Route::get('/criminal_cases',"criminalController@index");
Route::post('/criminal_cases',"criminalController@store");
Route::delete('/criminal_cases/{id}',"criminalController@destroy");
Route::get('/criminal_cases/{id}',"criminalController@show");

Route::get('/civil_cases',"civilController@index");
Route::post('/civil_cases',"civilController@store");
Route::delete('/civil_cases/{id}',"civilController@destroy");
Route::get('/civil_cases/{id}',"civilController@show");

Route::get('/solutions',"solutionController@index");
Route::post('/solutions',"solutionController@store");
Route::delete('/solutions/{id}',"solutionController@destroy");
Route::get('/solutions/{id}',"solutionController@show");


