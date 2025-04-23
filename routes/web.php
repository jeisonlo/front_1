<?php


use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ResourceController;
use App\Models\Bill;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

use App\Http\Controllers\TestController;

use App\Http\Controllers\UsuarioController;

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




// Ruta de bienvenida

Route::get('/', function () {
    return view('welcome');
});




//Rutas de mapa de sueños  
Route::get('mapadesuenos/canvas', function () {
    return view('mapadesuenos/canvas');  // Solo una vista para todos los libros
})->name('lienzo');

Route::get('mapadesuenos/seguimiento1', function () {
    return view('mapadesuenos/seguimiento1'); // Sin la extensión .blade.php
})->name('seguimiento1');



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

////////

Route::get('mapadesuenos/librosarte', function () {
    return view('mapadesuenos/librosarte');  // Solo una vista para todos los libros
})->name('arte');

Route::get('mapadesuenos/librosmeditacion', function () {
    return view('mapadesuenos/librosmeditacion');  // Solo una vista para todos los libros
})->name('meditacion');

Route::get('mapadesuenos/librosnaturaleza', function () {
    return view('mapadesuenos/librosnaturaleza');  // Solo una vista para todos los libros
})->name('naturaleza');

Route::get('mapadesuenos/librospoesia', function () {
    return view('mapadesuenos/librospoesia');  // Solo una vista para todos los libros
})->name('poesia');

Route::get('mapadesuenos/librossuperacion', function () {
    return view('mapadesuenos/librossuperacion');  // Solo una vista para todos los libros
})->name('superacion');

//////

Route::get('mapadesuenos/arte', function () {
    return view('arte');  // Solo una vista para todos los libros
});

Route::get('mapadesuenos/favoritos', function () {
    return view('mapadesuenos/favoritos');  // Solo una vista para todos los libros
})->name('favoritos');











Route::get('mapadesuenos/arte', function () {
    return view('arte');  // Solo una vista para todos los libros
});
Route::get('mapadesuenos/favoritos', function () {
    return view('mapadesuenos/favoritos');  // Solo una vista para todos los libros
})->name('favoritosli');
////////

//////////////////////////////////////////////////////////////////////

Route::get('/einicio', function () {
    return view('rutinasEjercicios.einicio'); // Usa el punto para indicar la carpeta
});
Route::get('/ejercicios', function () {
    return view('rutinasEjercicios.ejercicios'); // Asegúrate de que esta vista exista en resources/views/ejercicios/index.blade.php
});
Route::get('/detalles/{id}', function () {
    return view('rutinasEjercicios.detalles');
});
Route::get('/reproductor', function () {
    return view('rutinasEjercicios.reproRutina');
})->name('reproRutina');

Route::get('/favoritos', function () {
    return view('rutinasEjercicios.favoritos');
})->name('favoritos');

Route::get('/calendario', function () {
    return view('rutinasEjercicios.calendario');
});
Route::get('/notificaciones', function () {
    return view('rutinasEjercicios.notificaciones');
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

Route::get('/perfil', function () {
    return view('inicioSesion.usuario');
})->name('profile');

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



// Rutas para USUARIO
Route::prefix('usuario')->group(function () {
    // Archivos
    Route::get('/archivos', function () {
        return view('atencion-profesional.USUARIO.Archivos_Usuario.index');
    })->name('archivos.usuario');

    // Cancelar Cita
    Route::get('/cancelar-cita', function () {
        return view('atencion-profesional.USUARIO.CancelarCita2_Usuario.index');
    })->name('cancelar.cita.usuario');

    // Citas
    Route::get('/citas', function () {
        return view('atencion-profesional.USUARIO.Citas_Usuario.index');
    })->name('citas.usuario');

    // Citas Programadas
    Route::get('/citas-programadas', function () {
        return view('atencion-profesional.USUARIO.CitasProgramadas_Usuario.index');
    })->name('citas.programadas.usuario');

    // Consulta
    Route::get('/consulta', function () {
        return view('atencion-profesional.USUARIO.Consulta_Usuario.index');
    })->name('consulta.usuario');

    // Encuesta Inicial
    Route::get('/encuesta-inicial', function () {
        return view('atencion-profesional.USUARIO.Encuesta_Inicial.index');
    })->name('encuesta.inicial.usuario');

    // Historial de Pagos
    Route::get('/historial-pagos', function () {
        return view('atencion-profesional.USUARIO.HistorialPagos_Usuario.index');
    })->name('historial.pagos.usuario');

    // Mis Códigos
    Route::get('/mis-codigos', function () {
        return view('atencion-profesional.USUARIO.MisCodigosUsuario.index');
    })->name('mis.codigos.usuario');

    // Notificaciones
    Route::get('/notificaciones', function () {
        return view('atencion-profesional.USUARIO.Notificaciones_Usuario.index');
    })->name('notificaciones.usuario');
    //Notificacion Abierta
    Route::get('/notificacion-abierta', function () {
        return view('atencion-profesional.USUARIO.NotificacionAbierta_Usuario.index');
    })->name('notificacion.abierta.usuario');

    // Reseñas
    Route::get('/reseñas', function () {
        return view('atencion-profesional.USUARIO.Reseñas_Usuario.index');
    })->name('reseñas.usuario');

    // Agendar Cita
    Route::get('/agendar-cita', function () {
        return view('atencion-profesional.USUARIO.AgendarCita_Usuario.index');
    })->name('agendar.cita.usuario');

    //Cita Actualizada 
    Route::get('/cita-actualizada', function () {
        return view('atencion-profesional.USUARIO.CitaActualizada_Usuario.index');
    })->name('cita.actualizada.usuario');

    //CertificadosProfesionales
    Route::get('/certificados-profesionales', function () {
        return view('atencion-profesional.USUARIO.CertificadosProfesionales_Usuario.index');
    })->name('certificados.profesionales.usuario');

    //comprar Codigos
    Route::get('/comprar-codigos', function () {
        return view('atencion-profesional.USUARIO.ComprarCodigos_Usuario.index');
    })->name('comprar.codigos.usuario');

    //Pagos web
    Route::get('/pagos-web', function () {
        return view('atencion-profesional.USUARIO.PagosWeb_Usuario.index');
    })->name('pagos.web.usuario');

    //Informe
    Route::get('/informe', function () {
        return view('atencion-profesional.USUARIO.Informes1_Usuario.index');
    })->name('informe.usuario');
    //informe2
    Route::get('/informe2', function () {
        return view('atencion-profesional.USUARIO.Informes2_Usuario.index');
    })->name('informe2.usuario');

    //Home
    Route::get('/home', function () {
        return view('atencion-profesional.USUARIO.Home_Usuario.index');
    })->name('home.usuario');

    //Escribir Reseña
    Route::get('/escribir-reseña', function () {
        return view('atencion-profesional.USUARIO.EscribirReseña_Usuario.index');
    })->name('escribir.reseña.usuario');

    //Profesionales
    Route::get('/profesionales', function () {
        return view('atencion-profesional.USUARIO.Profesionales_Usuario.index');
    })->name('profesionales.usuario');

   //Recursos
    Route::get('/recursos', function () {
        return view('atencion-profesional.USUARIO.Recursos_Usuario.index');
    })->name('recursos.usuario');

    //Perfil Profesional
    Route::get('/perfil-profesional', function () {
        return view('atencion-profesional.USUARIO.Perfil-Profesional.index');
    })->name('perfil.profesional.usuario');

    //Historial citas

    Route::get('/historial-citas', function () {
        return view('atencion-profesional.USUARIO.HistorialCitas_Usuario.index');   
    })->name('historial.citas.usuario');
});
// Rutas para PROFESIONAL
Route::prefix('profesional')->group(function () {
    // archivos
    Route::get('/archivos', function () {
        return view('atencion-profesional.PROFESIONAL.Archivos_Profesional.index');
    })->name('archivos.profesional');

    // Citas
    Route::get('/citas', function () {
        return view('atencion-profesional.PROFESIONAL.Cita_Profesional.index');
    })->name('citas.profesional');

    // Profesionales
    Route::get('/profesionales', function () {
        return view('atencion-profesional.PROFESIONAL.Profesionales_Profesional.index');
    })->name('profesionales.profesional');

    // Recursos
    Route::get('/recursos', function () {
        return view('atencion-profesional.PROFESIONAL.Recursos_Profesional.index');
    })->name('recursos.profesional');

    // Notificaciones
    Route::get('/notificaciones', function () {
        return view('atencion-profesional.PROFESIONAL.Notificaciones_Profesional.index');
    })->name('notificaciones.profesional');

    // Historial de Citas
    Route::get('/historial-citas', function () {
        return view('atencion-profesional.PROFESIONAL.HistorialCitas.index');   
    })->name('historial.citas.profesional');

    // Informes
    Route::get('/informes', function () {
        return view('atencion-profesional.PROFESIONAL.Informes1_Profesional.index');
    })->name('informes.profesional');

    //Informes2
    Route::get('/informes2', function () {
        return view('atencion-profesional.PROFESIONAL.Informes2_Profesional.index');
    })->name('informes2.profesional');

   
    // Mis Citas
    Route::get('/mis-citas', function () {
        return view('atencion-profesional.PROFESIONAL.MisCitas.index');
    })->name('mis.citas.profesional');

    // Reseñas
    Route::get('/reseñas', function () {
        return view('atencion-profesional.PROFESIONAL.Reseñas_Profesional.index');
    })->name('reseñas.profesional');

    // Programar Cita
    Route::get('/programar-cita', function () {
        return view('atencion-profesional.PROFESIONAL.ProgramarCita_Profesional.index');
    })->name('programar.cita.profesional');

     // Home
     Route::get('/home', function () {
        return view('atencion-profesional.PROFESIONAL.Menu_Profesional.index');
    })->name('home.profesional');
    
     // Historial de pagos
    Route::get('/historial-pagos', function () {
        return view('atencion-profesional.PROFESIONAL.MisCodigosProfesional.index');   
    })->name('historial.pagos.profesional');

     // Subir archivos
     Route::get('/subir-archivos', function () {
        return view('atencion-profesional.PROFESIONAL.Subir-Archivos.index');   
    })->name('subir.archivos.profesional');

    //Generar informe
    Route::get('/generar-informe', function () {
        return view('atencion-profesional.PROFESIONAL.GenerarInforme1_Profesional.index');   
    })->name('generar.informe.profesional');

   //Generar informe 2
    Route::get('/generar-informe2', function () {
        return view('atencion-profesional.PROFESIONAL.GenerarInforme2_Profesional.index');   
    })->name('generar.informe2.profesional');

    //Consulta
    Route::get('/consulta', function () {
        return view('atencion-profesional.PROFESIONAL.Consulta_Profesional.index');
    })->name('consulta.profesional');

    //Cita Actualizada
    Route::get('/cita-actualizada', function () {
        return view('atencion-profesional.PROFESIONAL.CitaActualizada-Profesional.index');
    })->name('cita.actualizada.profesional');

    //CancelarCita2
    Route::get('/cancelar-cita2', function () {
        return view('atencion-profesional.PROFESIONAL.CancelarCita2_Profesional.index');
    })->name('cancelar.cita2.profesional');

    //NotificacionAbierta
    Route::get('/notificacion-abierta', function () {
        return view('atencion-profesional.PROFESIONAL.NotificacionAbierta_Profesional.index');
    })->name('notificacion.abierta.profesional');

   //Notificacion
    Route::get('/notificacion', function () {
        return view('atencion-profesional.PROFESIONAL.Notificaciones_Profesional.index');
    })->name('notificacion.profesional');

    //PerfilProfesional
    Route::get('/perfil-profesional', function () {
        return view('atencion-profesional.PROFESIONAL.Perfil-Profesional.index');
    })->name('perfil.profesional');

    
});
// Rutas para el Footer (PROFESIONAL)
Route::prefix('footer')->group(function () {
    // Acerca de Tranquilidad
    Route::get('/quienes-somos', function () {
        return view('atencion-profesional.PROFESIONAL.Footer.inicio.link.quienessomos');
    })->name('quienes.somos');

    Route::get('/beneficios-tranquilidad', function () {
        return view('atencion-profesional.PROFESIONAL.Footer.inicio.link.beneficiosdetranquilidad');
    })->name('beneficios.tranquilidad');

    Route::get('/consejos-bienestar', function () {
        return view('atencion-profesional.PROFESIONAL.Footer.inicio.link.consejodebienestar');
    })->name('consejos.bienestar');

    // Ayuda y Soporte
    Route::get('/contacto', function () {
        return view('atencion-profesional.PROFESIONAL.Footer.inicio.link.contacto');
    })->name('contacto');

    Route::get('/sugerencias', function () {
        return view('atencion-profesional.PROFESIONAL.Footer.inicio.link.sugerencias');
    })->name('sugerencias');

    Route::get('/guia-uso', function () {
        return view('atencion-profesional.PROFESIONAL.Footer.inicio.link.guiadeuso');
    })->name('guia.uso');

    // Información Legal
    Route::get('/terminos-condiciones', function () {
        return view('atencion-profesional.PROFESIONAL.Footer.inicio.link.terminosycondiciones');
    })->name('terminos.condiciones');

    Route::get('/politica-privacidad', function () {
        return view('atencion-profesional.PROFESIONAL.Footer.inicio.link.politica de privacidad');
    })->name('politica.privacidad');

    Route::get('/aviso-legal', function () {
        return view('atencion-profesional.PROFESIONAL.Footer.inicio.link.avisolegal');
    })->name('aviso.legal');
});




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


//////////////////
Route::get('/avisolegal', function () {
    return view('mapadesuenos.links.avisolegal');
});

Route::get('/beneficiosdetranquilidad', function () {
    return view('mapadesuenos.links.beneficiosdetranquilidad');
});

Route::get('/consejodebienestar', function () {
    return view('mapadesuenos.links.consejodebienestar');
});
Route::get('/contacto', function () {
    return view('mapadesuenos.links.contacto');
});
Route::get('/guiadeuso', function () {
    return view('mapadesuenos.links.guiadeuso');
});

Route::get('/politicadeprivacidad', function () {
    return view('mapadesuenos.links.politicadeprivacidad');
});

Route::get('/quienessomos', function () {
    return view('mapadesuenos.links.quienessomos');
});

Route::get('/sugerencias', function () {
    return view('mapadesuenos.links.sugerencias');
});
Route::get('/terminosycondiciones', function () {
    return view('mapadesuenos.links.terminosycondiciones');
});
///////////////////////////