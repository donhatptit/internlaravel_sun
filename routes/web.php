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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix'=> 'author', 'middleware'=>'auth'], function (){
    Route::get('index', 'AuthorsController@index')->name('author.manager');;
    Route::get('add', 'AuthorsController@create')->name('add');
    Route::post('add', 'AuthorsController@store')->name('add.author');
    Route::get('edit/{id}', 'AuthorsController@edit')->name('edit');
    Route::post('edit/{id}', 'AuthorsController@update')->name('update.author');
    Route::get('delete/{id}', 'AuthorsController@destroy');
});


