<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TestController extends Controller
{
    public function showForm()
    {
        return view('Establecer');
    }

    public function store(Request $request)
    {
        try {
            $response = Http::post(env('BACKEND_API_URL') . '/api/test-bienestar', [
                'peso' => $request->peso,
                'altura' => $request->altura,
                'edad' => $request->edad,
                'sexo' => $request->sexo,
                'complexion' => $request->complexion,
                'actividad' => $request->actividad,
                'suenio' => $request->suenio,
                'estres' => $request->estres,
                'objetivo' => $request->objetivo
            ]);

            if ($response->successful()) {
                return back()->with('success', 'Test completado'); 
            }
    
            return back()->with('error', 'Error al guardar');

        } catch (\Exception $e) {
            return back()->with('error', 'Error de conexión');
        }
    }
}