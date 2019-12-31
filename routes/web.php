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


Route::get('/', 'BlogController@index')->name('welcome');

//Para poder verificar
//Auth::routes(['verify'=> true]);

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');

//Posts

Route::get('/posts', 'PostController@index')->name('posts.index');
Route::get('/posts/create', 'PostController@create')->name('posts.create');
Route::post('/posts', 'PostController@store')->name('posts.store');
Route::get('/posts/{id}', 'PostController@show')->name('posts.show');
Route::get('/posts/{id}/edit', 'PostController@edit')->name('posts.edit');
Route::put('/posts/{id}', 'PostController@update')->name('posts.update');
Route::delete('/posts/{id}', 'PostController@destroy')->name('posts.destroy');

//Todo en una linea
//Route::resource('posts', 'PostController');

//Route::get('/admin','AdminController@index')->name('admin')->middleware('admin');
Route::get('/admin','AdminController@main')->name('admin.main');
Route::get('/admin/roles','AdminController@roles')->name('admin.roles');


Route::post('/admin/roles/{id}/create', 'AdminController@createRole')->name('admin.roles.create');
Route::get('/admin/roles/{id}/edit','AdminController@editRoles')->name('admin.roles.edit');
Route::delete('/admin/roles/{id}','AdminController@deleteRole')->name('admin.roles.delete');

Route::delete('/admin/user/{id}','AdminController@destroyUser')->name('admin.user.delete');

//Route::post('/admin/{id}/roles','AdminController@updateRoles')->name('admin.updateRoles');


Route::post('/admin/{id}/roles','AdminController@updateRoles')->name('admin.updateRoles');


Route::get('/editor','EditorController@index')->name('editor')->middleware('editor');

