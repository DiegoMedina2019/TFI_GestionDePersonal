<?php

use Illuminate\Support\Facades\Route;

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
   // return view('welcome');
   return redirect()->route('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/Empleados', 'EmpleadoController@index')->name('empleado.index');

Route::group(['middleware' => ['permission:mod-usuarios']], function () {
   Route::resource('usuarios', 'UsuariosController');
});
Route::group(['middleware' => ['permission:mod-empleados']], function () {
   Route::resource('empleados', 'EmpleadoController');
   Route::post('addSupervisor', 'EmpleadoController@addSupervisor')->name('add.supervisor');
   Route::get('reportes/{empleado}', 'EmpleadoController@reporte')->name('reporte');
});
Route::group(['middleware' => ['permission:mod-roles-permisos']], function () {
   Route::resource('roles-permisos', 'RolesPermisosController');
});

/* 

+--------+-----------+-------------------------------------+------------------------+------------------------------------------------------------------------+-------------------------------+
| Domain | Method    | URI                                 | Name                   | Action                                                                 | Middleware
       |
+--------+-----------+-------------------------------------+------------------------+------------------------------------------------------------------------+-------------------------------+
|        | GET|HEAD  | /                                   |                        | Closure                                                                | web
       |
|        | GET|HEAD  | api/user                            |                        | Closure                                                                | api
       |
|        |           |                                     |                        |                                                                        | auth:api
       |
|        | POST      | empleados                           | empleados.store        | App\Http\Controllers\EmpleadoController@store                          | web
       |
|        |           |                                     |                        |                                                                        | permission:mod-empleados      |
|        | GET|HEAD  | empleados                           | empleados.index        | App\Http\Controllers\EmpleadoController@index                          | web
       |
|        |           |                                     |                        |                                                                        | permission:mod-empleados      |
|        | GET|HEAD  | empleados/create                    | empleados.create       | App\Http\Controllers\EmpleadoController@create                         | web
       |
|        |           |                                     |                        |                                                                        | permission:mod-empleados      |
|        | PUT|PATCH | empleados/{empleado}                | empleados.update       | App\Http\Controllers\EmpleadoController@update                         | web
       |
|        |           |                                     |                        |                                                                        | permission:mod-empleados      |
|        | GET|HEAD  | empleados/{empleado}                | empleados.show         | App\Http\Controllers\EmpleadoController@show                           | web
       |
|        |           |                                     |                        |                                                                        | permission:mod-empleados      |
|        | DELETE    | empleados/{empleado}                | empleados.destroy      | App\Http\Controllers\EmpleadoController@destroy                        | web
       |
|        |           |                                     |                        |                                                                        | permission:mod-empleados      |
|        | GET|HEAD  | empleados/{empleado}/edit           | empleados.edit         | App\Http\Controllers\EmpleadoController@edit                           | web
       |
|        |           |                                     |                        |                                                                        | permission:mod-empleados      |
|        | GET|HEAD  | home                                | home                   | App\Http\Controllers\HomeController@index                              | web
       |
|        |           |                                     |                        |                                                                        | auth
       |
|        | GET|HEAD  | login                               | login                  | App\Http\Controllers\Auth\LoginController@showLoginForm                | web
       |
|        |           |                                     |                        |                                                                        | guest
       |
|        | POST      | login                               |                        | App\Http\Controllers\Auth\LoginController@login                        | web
       |
|        |           |                                     |                        |                                                                        | guest
       |
|        | POST      | logout                              | logout                 | App\Http\Controllers\Auth\LoginController@logout                       | web
       |
|        | GET|HEAD  | password/confirm                    | password.confirm       | App\Http\Controllers\Auth\ConfirmPasswordController@showConfirmForm    | web
       |
|        |           |                                     |                        |                                                                        | auth
       |
|        | POST      | password/confirm                    |                        | App\Http\Controllers\Auth\ConfirmPasswordController@confirm            | web
       |
|        |           |                                     |                        |                                                                        | auth
       |
|        | POST      | password/email                      | password.email         | App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail  | web
       |
|        | GET|HEAD  | password/reset                      | password.request       | App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm | web
       |
|        | POST      | password/reset                      | password.update        | App\Http\Controllers\Auth\ResetPasswordController@reset                | web
       |
|        | GET|HEAD  | password/reset/{token}              | password.reset         | App\Http\Controllers\Auth\ResetPasswordController@showResetForm        | web
       |
|        | POST      | register                            |                        | App\Http\Controllers\Auth\RegisterController@register                  | web
       |
|        |           |                                     |                        |                                                                        | guest
       |
|        | GET|HEAD  | register                            | register               | App\Http\Controllers\Auth\RegisterController@showRegistrationForm      | web
       |
|        |           |                                     |                        |                                                                        | guest
       |
|        | GET|HEAD  | roles-permisos                      | roles-permisos.index   | App\Http\Controllers\RolesPermisosController@index                     | web
       |
|        |           |                                     |                        |                                                                        | permission:mod-roles-permisos |
|        | POST      | roles-permisos                      | roles-permisos.store   | App\Http\Controllers\RolesPermisosController@store                     | web
       |
|        |           |                                     |                        |                                                                        | permission:mod-roles-permisos |
|        | GET|HEAD  | roles-permisos/create               | roles-permisos.create  | App\Http\Controllers\RolesPermisosController@create                    | web
       |
|        |           |                                     |                        |                                                                        | permission:mod-roles-permisos |
|        | GET|HEAD  | roles-permisos/{roles_permiso}      | roles-permisos.show    | App\Http\Controllers\RolesPermisosController@show                      | web
       |
|        |           |                                     |                        |                                                                        | permission:mod-roles-permisos |
|        | PUT|PATCH | roles-permisos/{roles_permiso}      | roles-permisos.update  | App\Http\Controllers\RolesPermisosController@update                    | web
       |
|        |           |                                     |                        |                                                                        | permission:mod-roles-permisos |
|        | DELETE    | roles-permisos/{roles_permiso}      | roles-permisos.destroy | App\Http\Controllers\RolesPermisosController@destroy                   | web
       |
|        |           |                                     |                        |                                                                        | permission:mod-roles-permisos |
|        | GET|HEAD  | roles-permisos/{roles_permiso}/edit | roles-permisos.edit    | App\Http\Controllers\RolesPermisosController@edit                      | web
       |
|        |           |                                     |                        |                                                                        | permission:mod-roles-permisos |
|        | POST      | usuarios                            | usuarios.store         | App\Http\Controllers\UsuariosController@store                          | web
       |
|        |           |                                     |                        |                                                                        | permission:mod-usuarios       |
|        | GET|HEAD  | usuarios                            | usuarios.index         | App\Http\Controllers\UsuariosController@index                          | web
       |
|        |           |                                     |                        |                                                                        | permission:mod-usuarios       |
|        | GET|HEAD  | usuarios/create                     | usuarios.create        | App\Http\Controllers\UsuariosController@create                         | web
       |
|        |           |                                     |                        |                                                                        | permission:mod-usuarios       |
|        | DELETE    | usuarios/{usuario}                  | usuarios.destroy       | App\Http\Controllers\UsuariosController@destroy                        | web
       |
|        |           |                                     |                        |                                                                        | permission:mod-usuarios       |
|        | PUT|PATCH | usuarios/{usuario}                  | usuarios.update        | App\Http\Controllers\UsuariosController@update                         | web
       |
|        |           |                                     |                        |                                                                        | permission:mod-usuarios       |
|        | GET|HEAD  | usuarios/{usuario}                  | usuarios.show          | App\Http\Controllers\UsuariosController@show                           | web
       |
|        |           |                                     |                        |                                                                        | permission:mod-usuarios       |
|        | GET|HEAD  | usuarios/{usuario}/edit             | usuarios.edit          | App\Http\Controllers\UsuariosController@edit                           | web
       |
|        |           |                                     |                        |                                                                        | permission:mod-usuarios       |
+--------+-----------+-------------------------------------+------------------------+------------------------------------------------------------------------+-------------------------------+


*/