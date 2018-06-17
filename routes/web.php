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



Route::group(['prefix'=>'admin', 'middleware'=>'auth'],function(){
  Route::get('/posts/trashed',[
    'uses'=>'PostsController@trashed',
    'as'=>'posts.trashed'
  ]);
  Route::get('/posts/kill/{id}',[
    'uses'=>'PostsController@kill',
    'as'=>'posts.kill'
  ]);

  Route::get('/posts/restore/{id}',[
    'uses'=>'PostsController@restore',
    'as'=>'posts.restore'
  ]);
  Route::get('/home', 'HomeController@index')->name('home');
  Route::resource('/posts','PostsController');
  Route::resource('/category','CategoriesController');

});
