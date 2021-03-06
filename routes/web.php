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

/*
 * GET /libro -> muestra todos los libros
 * GET /libro/create -> muestra formulario de creacion de un nuevo libro
 * GET /libro/edit -> muestra formulario de edicion de un libro
 * GET /libro/{id} -> muestra un libro por id
 * POST /libro -> Crea un nuevo libro en la base de datos
 * PUT/PATCH /libro/{id} -> actualiza un libro
 * DELETE /libro/{id} -> elimina un libro
 */
Route::resource('libro', 'LibrosController');

// Aquí lo que le estamos diciendo es que cuando haya una petición HTTP y que sea de tipo GET, con la terminación ‘api/v1/libros’,
// se llame al método getLibros  del controlador LibrosController.
Route::get('api/v1/libros','LibrosController@getLibros');
