<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Rutas de mapa de sueños  
Route::get('mapadesuenos/canvas', function () {
    return view('mapadesuenos/canvas');  // Solo una vista para todos los libros
})->name('lienzo');
Route::get('mapadesuenos/seguimiento', function () {
    return view('mapadesuenos/seguimiento'); // Sin la extensión .blade.php
})->name('seguimiento');


//Rutas de libros
Route::get('mapadesuenos/libro1', function () {
    return view('mapadesuenos/libro1');  // Solo una vista para todos los libros
})->name('libro1');
Route::get('mapadesuenos/libro2', function () {
    return view('mapadesuenos/libro2');  // Solo una vista para todos los libros
})->name('libro2');
Route::get('mapadesuenos/categoria', function () {
    return view('mapadesuenos/categoria');  // Solo una vista para todos los libros
})->name('categorias');


//Rutas para el header y el footer
Route::get('mapadesuenos/header', function () {
    return view('mapadesuenos/plantillas/header');  // Solo una vista para todos los libros
});

Route::get('mapadesuenos/footer', function () {
    return view('mapadesuenos/plantillas/footer');  // Solo una vista para todos los libros
});

//Rutas para iniciar al mapa de sueños y libros
Route::get('mapadesuenos/iniciomapa', function () {
    return view('mapadesuenos/iniciomapa');  // Solo una vista para todos los libros
});

//Rutas para iniciar al mapa de sueños o seguimiento 

//Rutas para iniciar al mapa de sueños y libros
Route::get('mapadesuenos/mapainiciodos', function () {
    return view('mapadesuenos/mapainiciodos');  // Solo una vista para todos los libros
})->name('maps');


Route::get('mapadesuenos/librosarte', function () {
    return view('mapadesuenos/librosarte');  // Solo una vista para todos los libros
})->name('arte');











Route::get('mapadesuenos/arte', function () {
    return view('arte');  // Solo una vista para todos los libros
});
Route::get('mapadesuenos/favoritos', function () {
    return view('mapadesuenos/favoritos');  // Solo una vista para todos los libros
})->name('favoritos');
////////