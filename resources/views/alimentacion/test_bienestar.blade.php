@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center">Formulario de Evaluación de Bienestar</h2>
    <form action="{{ route('evaluacion.guardar') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="mb-3">
            <label for="edad" class="form-label">Edad</label>
            <input type="number" class="form-control" id="edad" name="edad" required>
        </div>
        <div class="mb-3">
            <label for="estado_animo" class="form-label">¿Cómo te sientes hoy?</label>
            <select class="form-control" id="estado_animo" name="estado_animo" required>
                <option value="feliz">Feliz</option>
                <option value="triste">Triste</option>
                <option value="ansioso">Ansioso</option>
                <option value="estresado">Estresado</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="comentarios" class="form-label">Comentarios adicionales</label>
            <textarea class="form-control" id="comentarios" name="comentarios" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>
@endsection
