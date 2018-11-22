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

Route::get('/index.php', function () {
    return view('welcome');
});

Route::get('/index/{slug}', function ($slug) {
    return view('welcome', ['name' => $slug]);
});

Route::get('test', 'IndexController@showIndex');
// USERS ROUTES
Route::resource('users', 'UserController');

Route::resource('home', 'AnnonceController')->middleware('verified');

//Route::get('/users/edit', 'UserController@edit');
Route::post('/users/update', ['as' => 'users.store', 'uses' => 'UserController@store']);
Route::post('/users/create', ['as' => 'users.create', 'uses' => 'UserController@create']);
Route::get('/users/edit', 'UserController@edit');
// ANNONCES ARTICLES
Route::post('/search', 'AnnonceController@search')->name('search');;
Route::patch('/ad', ['as' => 'ad.create', 'uses' => 'AnnonceController@create'])->name('ad');
Route::delete('/ad/delete/{id}', 'AnnonceController@destroy');
Route::get('/Newad', ['as' => 'ad.index', 'uses' => 'AnnonceController@newAd'])->name('Newad');
Route::get('/Myads/{id}', 'AnnonceController@show')->name('Myads');
Route::patch('/update', ['as' => 'ad.update', 'uses' => 'AnnonceController@Modify']);

// MESSAGERIE
Route::get('messages', 'MessageController@index')->name('messages');
Route::delete('messages/{id}', 'MessageController@destroy');
Route::post('/read', 'MessageController@read')->name('read');
Route::post('/send', 'MessageController@create')->name('send');
Route::delete('/messages', 'MessageController@destroy')->name('send');
// AUTH ROUTES
Auth::routes(['verify' => true]);

Auth::routes();

