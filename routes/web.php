<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoriacursoController;
use App\Http\Controllers\FacursoController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\AdquirircursoController;
use App\Http\Controllers\PagocursoController;
use App\Http\Controllers\PpagocursoController;
use App\Http\Controllers\ReportepagoController;

use App\Http\Controllers\PrincipalController;

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

// Route::get('/', 'home@index');

Route::get('/login', function () {
	return view('auth.login');
});

Auth::routes();


// Route::get('/flota', function () {
//     return view('flota.index');
// });

// Route::get('/flota/create', [FlotaController::class, 'create']);


Auth::routes(['register'=>false, 'reset' => false]);

// Route::get('/principal', [PrincipalController::class, 'index'])->name('index');

Route::get('/home', [FacursoController::class, 'index'])->name('home');
Route::resource('curso',FacursoController::class)->middleware('auth');
Route::resource('categoria',CategoriacursoController::class)->middleware('auth');
Route::resource('estudiante',EstudianteController::class)->middleware('auth');
Route::resource('adquirircurso',AdquirircursoController::class)->middleware('auth');
Route::resource('pagocurso',PagocursoController::class)->middleware('auth');
Route::resource('ppagocurso',PpagocursoController::class)->middleware('auth');
Route::resource('reporte',ReportepagoController::class)->middleware('auth');

Route::group(['middleware' => 'auth'], function(){
    
    Route::get('/pdf', [ReportepagoController::class, 'pdf'])->name('reporte.pdf');
    Route::get('reporte/{id}/enviarReporte', [ReportepagoController::class, 'enviarReporte'])->name('reporte.enviarReporte');

    
    Route::get('/', [ReportepagoController::class, 'index'])->name('home');
    Route::get('/', [CategoriacursoController::class, 'index'])->name('home');
    Route::get('/', [EstudianteController::class, 'index'])->name('home');
    Route::get('/', [AdquirircursoController::class, 'index'])->name('home');
    Route::get('/', [PagocursoController::class, 'index'])->name('home');
    Route::get('/', [PpagocursoController::class, 'index'])->name('home');
    Route::get('/', [FacursoController::class, 'index'])->name('home');

    Route::post('adquirircurso/eliminacursoadquirido', [AdquirircursoController::class, 'eliminacursoadquirido'])->name('adquirircurso.eliminacursoadquirido');

    Route::get('pagocurso/crearpago', [PagocursoController::class, 'crearpago'])->name('pagocurso.crearpago');
    Route::post('estudiante/buscaEstudiante', [EstudianteController::class, 'buscaEstudiante'])->name('estudiante.buscaEstudiante');
    Route::post('curso/buscaCodigo', [FacursoController::class, 'buscaCodigo'])->name('curso.buscaCodigo');

    
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

