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


Auth::routes();

/* Solo acceso para usuarios logeados */

Route::group(['middleware' => 'auth'], function () {

	/* Usuario Administrador */

	/* Rutas Empresas */
	Route::name('index_empresas')->get('/empresas', 'EmpresasController@index');

	Route::name('create_empresa')->get('/crear_empresa', 'EmpresasController@create');

	Route::name('new_empresa')->post('/empresa_save', 'EmpresasController@store');

	Route::name('edit_empresa')->get('/empre/{empresa}/edit', 'EmpresasController@edit');

	Route::name('update_empresa')->put('/emp/{empresa}', 'EmpresasController@update');

	Route::name('delete_empresa')->delete('/empresa/{empresa}', 'EmpresasController@delete');

	/* Rutas Cargos */
	Route::name('index_cargos')->get('/cargos', 'CargosController@index');

	Route::name('create_cargo')->get('/crear_cargo', 'CargosController@create');

	Route::name('new_cargo')->post('/cargo_save', 'CargosController@store');

	Route::name('edit_cargo')->get('/cargo/{cargo}/edit', 'CargosController@edit');

	Route::name('update_cargo')->put('/car/{empresa}', 'CargosController@update');

	Route::name('delete_cargo')->delete('/cargo/{cargo}', 'CargosController@delete');

	/* Rutas Empleados */
	Route::name('index_empleados')->get('/empleados', 'EmpleadosController@index');

	Route::name('create_empleado')->get('/crear_empleado', 'EmpleadosController@create');

	Route::name('new_empleado')->post('/empleado_save', 'EmpleadosController@store');

	Route::name('edit_empleado')->get('/emp/{empleado}/edit', 'EmpleadosController@edit');

	Route::name('update_empleado')->put('/empleado/{empleado}', 'EmpleadosController@update');

	Route::name('delete_empleado')->delete('/empleado/{empleado}', 'EmpleadosController@delete');


});

/* Rutas Públicas */

Route::get('/', 'IndexController@index');

Route::get('/home', 'HomeController@index')->name('home');

