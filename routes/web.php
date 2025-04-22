<?php

use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;

Route::get('/test-bienestar', [TestController::class, 'showForm'])->name('test.show');
Route::post('/test-bienestar', [TestController::class, 'store'])->name('test.store');

Route::get('/inicio-alimentacion', function () {
    return view('alimentacion.inicioAlimentacion');
});

Route::get('/Establecer', function () {
    return view('alimentacion.Establecer');
})->name('establecer');

Route::get('/inicioAlimentacion', function () {
    return view('alimentacion.inicioAlimentacion');
})->name('inicio');

Route::get('/foro', function () {
    return view('alimentacion.foro');
})->name('foro');

Route::get('/frutas', function () {
    return view('alimentacion.frutas');
})->name('frutas');

Route::get('/seguimiento', function () {
    return view('alimentacion.Seguimiento');
})->name('seguimiento');
