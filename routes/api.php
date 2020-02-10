<?php

use App\AuthorController;

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// esta ruta, se puede probar desde postman con la url = http://laravel.co/api/author, Cosumo para extraer datos.

Route::get('author','AuthorController@index')->name('getAuthor');

//Con esta ruta creo el servicio para crear registro en Author

Route::post('author/store','AuthorController@store')->name('postAuthor');

//Con esta ruta creo el servicio para crear registro en Book

Route::post('book/store','BookController@store')->name('postBook');

// Con esta ruta genero el servicio de lectura de book

Route::get('book','BookController@index')->name('getBook');


// Con esta ruta genero el servicio de detalle del author de un libro 

Route::get('author/{id}','AuthorController@detalle_autor')->name('getDetalle-author');









