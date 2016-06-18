<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/


Route::group(['middleware' => ['web']], function () {
	Route::resource('admin','AdminController');
	Route::resource('log','LogController');
	
	Route::get('logout','LogController@logout');
	
	Route::resource('user','UserController');
	
	//Route::get('quiniela/showQuinielas','QuinielaController@showQuinielas');
	Route::get('showQuinielas','User@showQuinielas');
	Route::get('showQuinielas','QuinielaController@showQuinielas');
	Route::get('/','FrontController@index');
	Route::get('reviews','FrontController@reviews');
	Route::get('contacto','FrontController@contacto');
	
	Route::resource('quiniela','QuinielaController');
	Route::get('verMiQuiniela','QuinielaController@verMiQuiniela');
	Route::resource('equipo','EquipoController');
	
	Route::get('showUsersQuiniela','UserquinielaController@showUsersQuiniela');


	Route::get('quiniela/inscribir','QuinielaController@inscribir');

	Route::resource('usertransaccion','UsertransaccionController');
	//Route::get('store/Usertransaccion','UsertransaccionController@store');

	Route::resource('userquiniela','UserquinielaController');
	Route::resource('usertransaccion','UsertransaccionController');
	
	Route::get('/showTransaccion','UsertransaccionController@showTransaccion');
	Route::get('/misQuinielas','UserquinielaController@misQuinielas');

	Route::resource('jugarquiniela','JugarQuinielaController');
	Route::resource('partido','PartidoController');
	Route::resource('resultado_A','ResultadoAdminController');
	Route::get('constructor','EquipoController@constructor');
	Route::get('buscar','ResultadoAdminController@buscar');
	Route::resource('pronostico','PronosticoController');
	Route::resource('posicion','PosicionController');
	Route::get('act_pos','PosicionController@act_pos');
	Route::resource('pronostico','PronosticoController');
	Route::get('act_pos','PosicionController@act_pos');


});
