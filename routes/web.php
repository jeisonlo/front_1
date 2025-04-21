<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ResourceController;
use App\Models\Bill;
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

// Ruta de bienvenida
Route::get('/', function () {
    return view('welcome');
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