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

Route::prefix('quizzes')->name('quizzes.')->group(function () {
    Route::get('', 'QuizController@json')->name('json');
    Route::get('{quiz}', 'QuizController@single')->name('single');
    Route::post('create', 'QuizController@create')->name('create');
});

Route::prefix('applicants')->name('applicants.')->group(function () {
    Route::post('create', 'ApplicantController@create')->name('create');
    Route::get('{applicant}', 'ApplicantController@single')->name('single');
});

