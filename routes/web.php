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

Route::get('/', 'HomeController@index');

Route::get('/deletePost/{id}', 'HomeController@deletePost');

Route::post('/addPost', 'HomeController@addPost');

Route::get('/editPost/{id}/{title}/{content}/{author}', function($id, $title, $content, $author) {
    return view('editPost', ['id' => $id, 'author' => $author, 'title' => $title, 'content' => $content]);
});

Route::post('/editPost', 'HomeController@editPost');