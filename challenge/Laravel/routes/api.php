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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Inserts
Route::post('/insertUser', 'UserController@insertUser');
Route::post('/insertMovie', 'MovieController@insertMovie');
Route::post('/createReview', 'ReviewsController@createReview');

// Gets
Route::get('/getAllUsers','UserController@getAll');
Route::get('/getAllMovies','MovieController@getAll');
Route::get('/getAllReviews','ReviewsController@getAll');
Route::get('/getUser/{id}','UserController@getUser');
Route::get('/getMovie/{id}','MovieController@getMovie');
Route::get('/getReview/{id}','ReviewsController@getReview');

Route::get('/getAvgRating/{id}','ReviewsController@getMovieAvgRating');

// Deletes
Route::delete('/userDelete/{id}','UserController@delById');
Route::delete('/movieDelete/{id}','MovieController@delById');
Route::delete('/reviewDelete/{id}','ReviewsController@delById');
