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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

/** USER AUTH */
Route::group( [ 'prefix' => 'v1', 'namespace' => 'Api\v1' ], function () {

	Route::post( '/registration', "UserController@register" )->name( 'register' );
} );

Route::group( [ 'prefix' => 'v1', 'namespace' => 'Api\v1', 'middleware' => 'auth:api' ], function () {

	/** USER */
	Route::get( '/user-details', "UserController@details" )->name( 'user_details' );

	/** NOTE */
	Route::group( [ 'prefix' => 'note'], function () {
		Route::post( '/create', "NoteController@createNew" )->name( 'note_create' );
		Route::post( '/update', "NoteController@edit" )->name( 'note_edit' );
	} );//NOTE

} );
