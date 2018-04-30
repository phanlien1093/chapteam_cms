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
Route::group([
	'prefix' => 'admin',
	'namespace' => 'Admin',
	'as' => 'admin.'
], function(){
	Route::get('/', 'HomeController@index')->name('index');
	//route for module
	Route::group([
		'prefix' => 'module',
		'as' => 'module.',
	], function(){
		Route::match(['get', 'post'], '/', 'ModuleController@index')->name('index');
		Route::match(['get', 'post'], '/add', 'ModuleController@add')->name('add');
	});
	//route for module post
	Route::group([
		'prefix' => 'post',
		'as' => 'post.',
	], function(){
		Route::match(['get', 'post'], '/', 'PostController@index')->name('index');
		Route::match(['get', 'post'], '/add', 'PostController@add')->name('add');
		Route::match(['get', 'post'], '/setting', 'PostController@setting')->name('setting');
	});

	//route for taxonmy

	Route::group([
		'prefix' => 'taxonomy',
		'as' => 'taxonomy.',
	], function(){
		Route::match(['get', 'post'], '/{type}/', 'TaxonomyController@index')->name('index');
	});
});
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
