<?php

use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CamionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\TransporteController;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('productos', ProductoController::class);
Route::get('/camiones', [CamionController::class, 'index'])->name('camiones.index');
Route::get('/camiones/{id}/editar', [CamionController::class, 'edit'])->name('camiones.editar');
Route::delete('/camiones/{id}', [CamionController::class, 'destroy'])->name('camiones.eliminar');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::resource('camiones', CamionController::class, ['parameters' => [
    'camiones' => 'camion'
]]);

Route::get('camiones/eliminar/{id}', 'CamionController@eliminarCamion')->name('camiones.eliminar');
Route::resource('camiones', CamionController::class);

Route::resource('camiones', CamionController::class);

Route::resource('marcas', MarcaController::class);

Route::resource('transportes', TransporteController::class);
