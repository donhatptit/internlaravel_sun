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
Route::group(['prefix'=> 'admin', 'middleware'=>'auth'], function (){
    Route::group(['prefix'=> 'author'], function(){
        Route::get('list', 'AuthorsController@index')->name('author.manager');;
        Route::get('add', 'AuthorsController@create')->name('addauthor');
        Route::post('add', 'AuthorsController@store')->name('add.author');
        Route::get('edit/{id}', 'AuthorsController@edit')->name('editauthor');
        Route::post('edit/{id}', 'AuthorsController@update')->name('update.author');
        Route::get('delete/{id}', 'AuthorsController@destroy')->name('deleteauthor');
    });
    Route::group(['prefix'=>'user'], function(){
        Route::get('list','UserController@index')->name('user.manager');
        Route::get('add','UserController@create')->name('adduser');
        Route::post('add', 'UserController@store')->name('add.user');
        Route::get('edit/{id}', 'UserController@edit')->name('edituser');
        Route::post('edit/{id}','UserController@update')->name('update.user');
        Route::get('delete/{id}', 'UserController@destroy')->name('delete.user');

    });

});


