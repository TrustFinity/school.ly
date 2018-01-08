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

//->middleware('auth:api')
Route::namespace('Api\v1')->group(function (){

   Route::get('/v1/teachers-kanban/{teacher}', 'KanbanApiController@loadForTeacher');
   Route::post('/v1/search/students', 'StudentApiController@search');
   Route::post('/v1/search/teachers', 'TeacherApiController@search');

});
