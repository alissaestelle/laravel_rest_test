<?php

use Illuminate\HTTP\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('authors', 'AuthorController@index');
Route::get('authors/{author}', 'AuthorController@show');
Route::post('authors', 'AuthorController@store');

Route::patch('authors/{author}', 'AuthorController@update');
Route::put('authors/{author}', 'AuthorController@update');
Route::delete('authors/{author}', 'AuthorController@destroy');


Route::get('books', 'BookController@index');
Route::get('books/{book}', 'BookController@show');
Route::post('books', 'BookController@store');

Route::patch('books/{book}', 'BookController@update');
Route::put('books/{book}', 'BookController@update');
Route::delete('books/{book}', 'BookController@destroy');