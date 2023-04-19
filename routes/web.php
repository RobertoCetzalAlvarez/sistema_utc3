<?php

use App\Models\Alumno;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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


Route::get('plantilla', function () {
    return view('plantilla');
});

Route::get('grupo', function () {
    return view('grupo');
});

//INICIO DE VISTAS
Auth::routes();
Route::get('/', function () {
    return view('welcome');
});
Route::get('empleados', function () {
    return view('aniadirempleados');
});
Route::get('alumnoo', function () {
    return view('aniadir_alumno');
});
Route::get('alumno1', function(){
    return view('finanzas_alumno');
});

//vistas con permisos
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/alumno', [App\Http\Controllers\AlumnoController::class, 'index'])->name('alumno');
Route::get('/coordinador', [App\Http\Controllers\CoordinadorController::class, 'index'])->name('coordinador');
Route::get('/finanzas', [App\Http\Controllers\FinanzasController::class, 'index'])->name('finanzas');
Route::get('/profesor', [App\Http\Controllers\ProfesorController::class, 'index'])->name('profesor');
Route::get('/serv-esc', [App\Http\Controllers\ServiciosEscolaresController::class, 'index'])->name('serv-esc');
Route::get('/tutor', [App\Http\Controllers\TutorController::class, 'index'])->name('tutor');

//Apis
Route::apiResource('/apiEmpleado','App\Http\Controllers\EmpleadosController');
Route::apiResource('/apiGrupo','App\Http\Controllers\GrupoController');
Route::apiResource('/apiAlumno','App\Http\Controllers\AlumnoApiController');
Route::apiResource('/apiCarrera','App\Http\Controllers\CarreraController');
Route::apiResource('/apiAlumno1','App\Http\Controllers\AlumnoFinanzaApiController');