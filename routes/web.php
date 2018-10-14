<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [
    'as' => 'main',
    'uses' => 'mainController@index'
]);

Route::post('/like/post', [
    'as' => 'likePost',
    'uses' => 'mainController@like'
]);

Route::get('/products', [
    'as' => 'products',
    'uses' => 'productsController@index'
]);

//aboutUs
Route::get('/aboutUs', [
    'as' => 'aboutUs',
    'uses' => 'aboutController@index'
]);

//sureveys
Route::resource('/surveys', 'surveyController');
Route::post('/surveys/HowTypeACount', [
    'as' => 'surveysHowTypeACount',
    'uses' => 'surveyController@HowTypeACount'
]);
Route::post('/surveys/ajaxControl', [
    'as' => 'surveysAjaxControl',
    'uses' => 'surveyController@ajaxControl'
]);
Route::post('/surveys/{survey}', [
    'as' => 'surveysPost',
    'uses' => 'surveyController@surveysPost'
]);
Route::get('/graphs', [
    'as' => 'surveys.graph',
    'uses' => 'surveyController@graph'
]);
Route::get('/graphs/{graph}', [
    'as' => 'surveys.show',
    'uses' => 'surveyController@graphId'
]);

//mail
Route::post('/send/email', [
    'as' => 'sendEmail',
    'uses' => 'mainController@mail'
]);
