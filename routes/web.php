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

Route::get('/', function () {
    return view('login');
});

Route::post('auth', 'Login@Auth');
Route::get('logout/{id}', 'Login@Logout');

Route::get('/dashboard', function () {
    return view('dashboard');
});


Route::get('/users', function () {
    return view('perfiles.Users.gestion');
});


Route::get('rol', function () {
    return view('perfiles.Roles.gestion');
});


Route::get('modules', function () {
    return view('perfiles.Modulos.gestion');
});


Route::get('funciones', function () {
    return view('perfiles.Funciones.gestion');
});

Route::get('category', function () {
    return view('configuracion.category.gestion');
});


Route::get('benefits', function () {
    return view('configuracion.benefits.gestion');
});


Route::get('customer-support', function () {
    return view('configuracion.customer_support.gestion');
});


Route::get('way-to-pay', function () {
    return view('configuracion.way-to-pay.gestion');
});


Route::get('countries', function () {
    return view('configuracion.countries.gestion');
});


Route::get('hosting', function () {
    return view('catalogos.hosting.gestion');
});
























