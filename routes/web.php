<?php

use App\Http\Controllers\MailController;
use App\Http\Livewire\PermisosController;
use App\Http\Livewire\RegistrosController;
use App\Http\Livewire\UsersController;
use App\Http\Livewire\InicioController;
use App\Http\Livewire\DocumentosController;
use App\Http\Livewire\GraficasController;
use App\Http\Livewire\DirigidosController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

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

Route::middleware([
    'auth:web',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    Route::get('inicio', InicioController::class)->name('inicio');
    Route::get('graficas', GraficasController::class)->name('graficas');
    Route::get('documentos', DocumentosController::class)->name('documentos');
    Route::get('dirigidos', DirigidosController::class)->name('dirigidos');
    Route::get('registros', RegistrosController::class)->name('registros');
    Route::get('usuarios', UsersController::class)->middleware('role:Administrador' , 'permission:usuarios_index')->name('usuarios');
    Route::get('permisos', PermisosController::class)->middleware('role:Administrador', 'permission:permisos_index')->name('permisos');
    Route::get('registros/export', [RegistrosController::class, 'export'])->name('exportar-excel');
    Route::get('registros/pdf', [RegistrosController::class, 'pdf'])->name('exportar-pdf');
   
});


