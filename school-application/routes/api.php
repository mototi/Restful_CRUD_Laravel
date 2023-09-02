<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BuildingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TeacherController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(
    [
        'prefix' => 'v1',
        'namespace' => 'App\Http\Controllers',
    ],
    function (){

        //auth routes group
        Route::group(
            [
                'prefix' => 'auth',
            ],
            function (){

                //register
                Route::post('/register', 'AuthController@register');

                //login
                Route::post('/login', 'AuthController@login');

            }
        );

        //building routes group
        Route::group(
            [
                'prefix' => 'buildings',
            ],
            function (){

                //get all buildings
                Route::get('/', 'BuildingController@index');

                //create new building
                Route::post('/', 'BuildingController@create')->middleware('auth:sanctum');

                //update building
                Route::put('/', 'BuildingController@update')->middleware('auth:sanctum');

                //delete building
                Route::delete('/{id}', 'BuildingController@delete')->middleware('auth:sanctum');

            }
        );

        //Teacher routes group
        Route::group(
            [
                'prefix' => 'teachers',
            ],
            function (){

                //create new teacher
                Route::post('/', 'TeacherController@createNewTeacher')->middleware('auth:sanctum');

                //update teacher
                Route::put('/', 'TeacherController@changesInTeacher')->middleware('auth:sanctum');

                //delete teacher
                Route::delete('/{id}', 'TeacherController@deleteTeacher')->middleware('auth:sanctum');

                //get all teachers
                Route::get('/', 'TeacherController@getAll');

                //get teacher by id
                Route::get('/{id}', 'TeacherController@getById');

            }
        );

    }
);
