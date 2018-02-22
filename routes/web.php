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
// For Posts
Route::get('/posts', 'PagesController@posts');

Route::get('/posts/{post}', 'PagesController@post');

Route::post('/posts/store', 'PagesController@store');

// For Comments
Route::post('/posts/{post}/store', 'CommentsController@store');

// For Categories (Sections)
Route::get('/category/{name}', 'PagesController@category');

// For Registeration
Route::get('/register', 'RegisterationController@create');
Route::post('/register', 'RegisterationController@store');

// For Login
Route::get('/login', 'SessionsController@create');
Route::post('/login', 'SessionsController@store');

// For Logout
Route::get('/logout', 'SessionsController@destroy');


Route::get('/accessdenied', 'PagesController@accessDenied');

//testing route
Route::get('/admin', [

	'uses' => 'PagesController@admin',
	'as' => 'content.admin',
	'middleware' => 'roles',
	'roles' => ['admin']

]);

Route::post('/add-role', [

	'uses' => 'PagesController@addRole',
	'as' => 'content.admin',
	'middleware' => 'roles',
	'roles' => ['admin']

]);

Route::get('/editor', [

	'uses' => 'PagesController@editor',
	'as' => 'content.admin',
	'middleware' => 'roles',
	'roles' => ['admin', 'editor']

]);

Route::post('/like', 'PagesController@like')->name('like');

Route::post('/dislike', 'PagesController@dislike')->name('dislike');

//stats

Route::get('/stats', 'PagesController@stats');



