<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\ModeloController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\RepuestoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\AutoController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\AutoVentaController;
use App\Http\Controllers\GarantiaController;

use App\Http\Controllers\Auth\CustomRegisteredUserController;

Route::get('/', function () {
    return view('auth.login');
});

//Route::get('/register', function () {
  //  return view('auth.register');
//})->name('register');
// Ruta de registro accesible para todos
Route::get('/register', [CustomRegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [CustomRegisteredUserController::class, 'store']);

// Middleware para rutas que requieren autenticación
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    // Rutas para RolController
    Route::resource('rols', RolController::class);

    Route::resource('marcas', MarcaController::class);

    Route::resource('modelos', ModeloController::class);

    Route::resource('proveedores', ProveedorController::class);

    Route::resource('repuestos', RepuestoController::class);

    Route::resource('clientes', ClienteController::class);

    Route::resource('autos', AutoController::class);

    Route::resource('autoventas', AutoVentaController::class);  

    Route::get('/garantia/{id}', [GarantiaController::class, 'create'])->name('garantia.create');

    Route::post('/garantia', [GarantiaController::class, 'store'])->name('garantia.store');

    Route::get('/venta/{id}', [VentaController::class, 'create'])->name('venta.create');

    Route::post('/venta', [VentaController::class, 'store'])->name('venta.store');
});
