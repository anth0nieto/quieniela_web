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
	Route::get('comoJugar','User@comoJugar');

	Route::get('showQuinielas','QuinielaController@showQuinielas');
	Route::get('/','FrontController@index');
	Route::get('reviews','FrontController@reviews');
	Route::get('contacto','FrontController@contacto');
	
	Route::resource('quiniela','QuinielaController');

	Route::resource('mail','MailController');

	


	Route::get('reset/Password','MailController@resetPassword');
	Route::get('storePassword','MailController@storePassword');


	Route::get('password/email','Auth\PasswordController@getEmail');
	Route::post('password/email','Auth\PasswordController@postEmail');

	Route::get('password/reset/{token}','Auth\PasswordController@getReset');
	Route::post('password/reset','Auth\PasswordController@postReset');



	Route::get('verQuiniela','QuinielaController@verMiQuiniela');
	Route::resource('equipo','EquipoController');
	
	Route::get('showUsersQuiniela','UserquinielaController@showUsersQuiniela');


	Route::get('verPerfil','UserController@verPerfil');
	Route::get('verPerfilLiga','UserController@verPerfilLiga');
	Route::get('quiniela/inscribir','QuinielaController@inscribir');

	Route::resource('usertransaccion','UsertransaccionController');



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

	Route::resource('eliminatoria','EliminatoriaController');

	Route::get('JugarSegundaFase','EliminatoriaController@create');

	Route::post('/pronostico_user','PronosticoController@pronostico_user');
	Route::post('/pronostico_user_nuevo','PronosticoController@pronostico_user_nuevo');

	Route::get('create','EliminatoriaController@create');

	Route::get('agregar','PartidoController@agregar');

	Route::post('/guardarpartido','PartidoController@guardarpartido');

	Route::get('mipdf','UserController@miJugadaPDF');
	Route::get('pdf','UserquinielaController@generarPDF');
	Route::get('enviarPDF','UserquinielaController@enviarPDF');
	Route::get('/showUsersRegistered','UserController@showUsersRegistered');

	Route::get('create_solo','EquipoController@create_solo');
	Route::post('store_solo','EquipoController@store_solo');

	Route::get('agregar_directo','PartidoController@agregar_directo');

	Route::post('verMiQuinielaNuevo','QuinielaController@verMiQuinielaNuevo');

	Route::post('partido_directo','PartidoController@partido_directo');

	Route::post('PronosticoNuevaQuiniela','PronosticoController@PronosticoNuevaQuiniela');

	Route::get('/getCreditos','UserController@getCreditos');

	Route::post('creditosTransaccion','UsertransaccionController@creditosTransaccion');

	Route::get('gestionCreditos','UsertransaccionController@gestionCreditos');

	Route::post('aprobarCredito','UsertransaccionController@aprobarCredito');

	Route::post('constructor','QuinielaController@finalizar');

	Route::get('gestionPagos','UsertransaccionController@gestionPagos');

	Route::post('/getPago','UserController@getPago');

	Route::post('pagosTransaccion','UsertransaccionController@pagosTransaccion');

	Route::post('aprobarPago','UsertransaccionController@aprobarPago');

	Route::post('inscripcion','QuinielaController@inscripcion');
	
	

});
