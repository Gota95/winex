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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//RUTAS DE MODULO ESTUDIANTES Y ENCARGADOS
Route::resource('estudiantes_encargados/genero','GenerosController');
Route::resource('estudiantes_encargados/encargado','EncargadosController');
Route::resource('estudiantes_encargados/estudiantes','EstudiantesController');

//RUTAS DE MODULO ESTABLECIMIENTO EDDUCATIVO
Route::resource('establecimiento_educativo','EstablecimientoController');

//RUTAS DE MODULO ASIGNACION DE CURSOS
Route::resource('asignacion_cursos','AsignacionesController');

//RUTAS DE MODULO CURSOS
Route::resource('cursos/curso','CursosController');
Route::resource('cursos/horario','HorariosController');

//RUTAS DE MODULO PERSONAL ADMINISTRATIVO
Route::resource('personal_administrativo/cargo','CargosController');
Route::resource('personal_administrativo/personal','PersonalController');

//RUTAS DE MODULO CARRERA
Route::resource('carrera/carrera','CarrerasController');
Route::resource('carrera/grado','GradosController');
Route::resource('carrera/jornada','JornadasController');
Route::resource('carrera/seccion','SeccionesController');

//RUTAS DE MODULO CICLO BIMESTRES
Route::resource('ciclo_bimestre/ciclo','CicloController');
Route::resource('ciclo_bimestre/bimestre','BimestreController');

//RUTAS DE MODULO NOTAS
Route::resource('notas/aspecto','AspectosController');
Route::resource('notas/nota','NotasController');
Route::resource('notas/tipo_evaluacion','TipoEvaluacionController');
Route::resource('notas/boleta','BoletasController');
Route::get('views/notas/boleta/boletabi1/{id}', 'BoletasController@boletabi1');
Route::get('views/notas/boleta/boletabi2/{id}', 'BoletasController@boletabi2');
Route::get('views/notas/boleta/boletabi3/{id}', 'BoletasController@boletabi3');
Route::get('views/notas/boleta/boletabi4/{id}', 'BoletasController@boletabi4');
Route::get('views/notas/boleta/boletabi5/{id}', 'BoletasController@boletabi5');

//RUTAS DE MODULO USUARIOS
Route::resource('usuarios','UsuariosController');

//RUTAS DE MODULO ASISTENCIA
Route::resource('asistencia','AsistenciaController');
Route::post('asistencia/list','AsistenciaController@listar');

//RUTAS DE MODULO MENSAJERIA
Route::resource('telegram','MensajeriaController');
Route::get('/updated-activity', 'TelegramController@updatedActivity');

//RUTAS DE MODULO CARNET
Route::resource('carnet','CarnetController');
Route::get('carnet/{id}', 'CarnetController@print');


//RUTAS DE MODULO DE PAGOS
Route::resource('pago','PagoController');


//RUTAS DE MODULO DE ACTIVIDAD
Route::resource('cursos/actividad','ActividadController');
Route::resource('calendario','CalendarioController');

//RUTAS DE MODULO DE Anexos
Route::resource('laminas','LaminaController');
