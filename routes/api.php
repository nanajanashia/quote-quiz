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

Route::post('/quotes', 'App\Http\Controllers\HomeController@getYesNoQuiz');
Route::post('/multiple-choice-quiz', 'App\Http\Controllers\HomeController@getMultipleChoiceQuiz');
Route::post('/start', 'App\Http\Controllers\HomeController@startQuiz');
Route::post('/finish', 'App\Http\Controllers\HomeController@finishQuiz');
Route::post('/correct-answers', 'App\Http\Controllers\HomeController@correctAnswers');
Route::post('/incorrect-answers', 'App\Http\Controllers\HomeController@incorrectAnswers');
Route::post('/statistics', 'App\Http\Controllers\HomeController@getStatistics');
