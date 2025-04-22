<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario; // Modelo que representa la tabla en la BD

class UsuarioController extends Controller
{
    public function mostrarFormulario()
    {
        $usuario = Usuario::first(); // Obtener el primer usuario (puedes modificar esto)
        return view('formulario', compact('usuario'));
    }

    public function guardarDatos(Request $request)
    {
        $request->validate([
            'peso' => 'required|numeric',
            'altura' => 'required|numeric',
            'edad' => 'required|numeric',
            'sexo' => 'required|string',
            'complexion' => 'required|string',
            'actividad' => 'required|string',
            'suenio' => 'required|string',
            'estres' => 'required|string',
            'objetivo' => 'required|string'
        ]);

        // Guardar o actualizar datos en la base de datos
        Usuario::updateOrCreate(
            ['id' => 1], // Puedes cambiar esto para adaptarlo a varios usuarios
            $request->all()
        );

        return redirect()->route('formulario')->with('success', 'Datos guardados correctamente.');
    }
}
