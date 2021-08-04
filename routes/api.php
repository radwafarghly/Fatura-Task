<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|------------------ --------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/




Route::prefix('user')->name('user')->group(function() {
	Route::post('login', 'AuthController@login')->name('login');
});


Route::middleware('auth:api')->group(function() {
	Route::prefix('user')->name('user')->group(function() {
		Route::get('logout', 'AuthController@logout')->name('logout');
		Route::get('refresh', 'AuthController@refresh')->name('refresh');
		Route::get('me', 'AuthController@me')->name('me');


		
	});

	/** permission section **/
	Route::apiResource('permission', 'PermissionController')->only([
		'index'
	]);
	/** End of permission section **/

	/** role section **/
	Route::get('role/all', 'RoleController@getAllRoles');

	Route::apiResource('role', 'RoleController');
	/** End of role section **/
 
	/** user section **/
	Route::apiResource('user', 'UserController');
	/** End of user section **/
});





