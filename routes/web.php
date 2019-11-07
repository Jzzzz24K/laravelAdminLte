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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/home');
});

Auth::routes();

Route::get('/index', 'HomeController@index');
Route::get('/home', 'HomeController@home');
Route::resource('/menu','MenuController');
Route::resource('/adminuser',"AdminUserController");
Route::resource('/role',"RoleController");
Route::resource('/permission','PermissionController');
//图标库
Route::get('icons', function () {
    return view('icons');
});
