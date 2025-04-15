<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

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

Route::get('/registro', function () {
    return view('inicioSesion.registro');
});
Route::get('/registroProfesional', function () {
    return view('inicioSesion.registroProfesional');
});
Route::get('/login', function () {
    return view('inicioSesion.sesion');
});

Route::get('/usuario', function () {
    return view('inicioSesion.usuario');
});
Route::get('/confi', function () {
    return view('inicioSesion.configuraciones');
});
Route::get('/restablecer', function () {
    return view('inicioSesion.restablecerContraseña');
});

Route::get('/login', function () {
    return view('inicioSesion.sesion');
})->name('login');

Route::get('/inicioSesion/home', function () {
    return view('inicioSesion.home');
})->name('home');

Route::get('/tips/{id}', function ($id) {
    return view('inicioSesion.tips', ['tipId' => $id]);
});

