<?php

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('plantilla', function () {
    return view('plantilla');
});

Route::get('grupo', function () {
    return view('grupo');
});

Route::get('/empleados', function () {
    return view('empleados');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/coordinador', [App\Http\Controllers\CoordinadorController::class, 'index'])->name('coordinador');
Route::apiResource('apiGrupo','App\Http\Controllers\GrupoController');
