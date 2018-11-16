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

//article
Route::get('/article/check', [
    'as' => 'articleCheck',
    'uses' => 'articleController@hiddenWrite'
]);
Route::get('/article/success', [
    'as' => 'articleSuccess',
    'uses' => 'articleController@success'
]);
Route::post('/article/create', [
    'as' => 'articleCreate',
    'uses' => 'articleController@create'
]);
Route::post('/article/createPerform', [
    'as' => 'articleCreatePerform',
    'uses' => 'articleController@createPerform'
]);
Route::get('/notice', [
    'as' => 'articleNotice',
    'uses' => 'articleController@notice'
]);
Route::get('/story', [
    'as' => 'articleStory',
    'uses' => 'articleController@story'
]);
Route::get('/mou', [
    'as' => 'articleMou',
    'uses' => 'articleController@mou'
]);
Route::get('/notice/{id}', [
     'uses' => 'articleController@detail'
]);
Route::get('/story/{id}', [
     'uses' => 'articleController@detail'
]);
Route::get('/mou/{id}', [
     'uses' => 'articleController@detail'
]);
Route::get('/{category}/{id}/del', [
     'uses' => 'articleController@delete'
]);
Route::get('/{category}/{id}/update', [
     'uses' => 'articleController@update'
]);
Route::post('/article/update', [
    'uses' => 'articleController@updateEx'
]);
Route::post('/article/updatePerform', [
    'uses' => 'articleController@updatePerform'
]);
//sureveys
// Route::resource('/surveys', 'surveyController');
// Route::post('/surveys/HowTypeACount', [
//     'as' => 'surveysHowTypeACount',
//     'uses' => 'surveyController@HowTypeACount'
// ]);
// Route::post('/surveys/ajaxControl', [
//     'as' => 'surveysAjaxControl',
//     'uses' => 'surveyController@ajaxControl'
// ]);
// Route::post('/surveys/{survey}', [
//     'as' => 'surveysPost',
//     'uses' => 'surveyController@surveysPost'
// ]);
// Route::get('/graphs', [
//     'as' => 'surveys.graph',
//     'uses' => 'surveyController@graph'
// ]);
// Route::get('/graphs/{graph}', [
//     'as' => 'surveys.show',
//     'uses' => 'surveyController@graphId'
// ]);

//mail
Route::post('/send/email', [
    'as' => 'sendEmail',
    'uses' => 'mainController@mail'
]);

// Auth::routes();
//
// Route::get('/home', 'HomeController@index')->name('home');
