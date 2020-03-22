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

//use Illuminate\Support\Facades\Route;

Auth::routes();

Route::group(['middleware'=>['auth','rbac']],function(){
    Route::get('/', 'HomeController@home');
    Route::get('/index', 'HomeController@index');
    Route::resource('/menu','MenuController');
    Route::resource('/adminuser',"AdminUserController");
    Route::resource('/role',"RoleController");
    Route::resource('/permission','PermissionController');
    Route::resource('/modifyPassword','ModifyPasswordController');
});
Route::get('403', 'HomeController@noPermission');

Route::get('mail/send','MailController@send');

//图标库
Route::get('icons', function () {
    return view('icons');
});
