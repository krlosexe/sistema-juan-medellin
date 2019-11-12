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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});




Route::post('verify-token', 'Login@VerifyToken');

Route::resource('user', 'UsuariosController');
Route::post('status-user/{id}/{status}', 'UsuariosController@statusUser');
Route::get('get-asesoras', 'UsuariosController@GetAsesoras');

Route::resource('modulos', 'ModulosController');
Route::post('status-modulo/{id}/{status}', 'ModulosController@status');


Route::resource('funciones', 'FuncionesController');
Route::post('status-funciones/{id}/{status}', 'FuncionesController@status');


Route::get('list-funciones', 'FuncionesController@listFunciones');

Route::get('verify-permiso', 'Login@VerifyPermiso');

Route::resource('roles', 'RolesController');
Route::post('status-rol/{id}/{status}', 'RolesController@status');


Route::resource('category', 'CategoryController');
Route::post('status-category/{id}/{status}', 'CategoryController@status');


Route::resource('benefits', 'BenefitsController');
Route::post('status-benefits/{id}/{status}', 'BenefitsController@status');

Route::resource('customer-support', 'CustomerSupportController');
Route::post('status-customer-support/{id}/{status}', 'CustomerSupportController@status');

Route::resource('way-to-pay', 'WayYoPayController');
Route::post('status-way-to-pay/{id}/{status}', 'WayYoPayController@status');


Route::resource('countries', 'CountriesController');
Route::post('status-countries/{id}/{status}', 'CountriesController@status');



Route::resource('hosting', 'HostingController');
Route::post('status-hosting/{id}/{status}', 'HostingController@status');







