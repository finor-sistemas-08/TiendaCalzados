<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\RepartidorController;
use App\Http\Controllers\ModeloController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\TipoCalzadoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\VehiculoController;

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

[Route::get('/',
    function(){
        return view('index');   
    })
    
];

// --------MODELO-------
Route::get('/modelo/mostrar',[ModeloController::class,'mostrar'])->name('modelo.index');
Route::post('/modelo/insertar',[ModeloController::class,'insertar'])->name('modelo.store');
Route::post('/modelo/actualizar',[ModeloController::class,'actualizar'])->name('modelo.update');
Route::post('/modelo/eliminar',[ModeloController::class,'eliminar'])->name('modelo.delete');
// persona.update
//  -------CATEGORIA-------
Route::get('/categoria/mostrar',[CategoriaController::class,'mostrar'])->name('categoria.index');
Route::post('/categoria/insertar',[CategoriaController::class,'insertar'])->name('categoria.store');
Route::post('/categoria/actualizar',[CategoriaController::class,'actualizar'])->name('categoria.update');
Route::post('/categoria/eliminar',[CategoriaController::class,'eliminar'])->name('categoria.delete');

// --------MARCA----------
Route::get('/marca/mostrar',[MarcaController::class,'mostrar'])->name('marca.index');
Route::post('/marca/insertar',[MarcaController::class,'insertar'])->name('marca.store');
Route::post('/marca/actualizar',[MarcaController::class,'actualizar'])->name('marca.update');
Route::post('/marca/eliminar',[MarcaController::class,'eliminar'])->name('marca.delete');

// --------CLIENTE----------
Route::get('/cliente/mostrar',[ClienteController::class,'mostrar'])->name('cliente.index');
Route::post('/cliente/insertar',[ClienteController::class,'insertar'])->name('cliente.store');
Route::post('/cliente/actualizar',[ClienteController::class,'actualizar'])->name('cliente.update');
Route::post('/cliente/eliminar',[ClienteController::class,'eliminar'])->name('cliente.delete');

// --------PROVEEDOR----------
Route::get('/proveedor/mostrar',[ProveedorController::class,'mostrar'])->name('proveedor.index');
Route::post('/proveedor/insertar',[ProveedorController::class,'insertar'])->name('proveedor.store');
Route::post('/proveedor/actualizar',[ProveedorController::class,'actualizar'])->name('proveedor.update');
Route::post('/proveedor/eliminar',[ProveedorController::class,'eliminar'])->name('proveedor.delete');

// --------REPARTIDOR----------
Route::get('/repartidor/mostrar',[RepartidorController::class,'mostrar'])->name('repartidor.index');
Route::post('/repartidor/insertar',[RepartidorController::class,'insertar'])->name('repartidor.store');
Route::post('/repartidor/actualizar',[RepartidorController::class,'actualizar'])->name('repartidor.update');
Route::post('/repartidor/eliminar',[RepartidorController::class,'eliminar'])->name('repartidor.delete');

// --------TIPO CALZADO----------
Route::get('/tipoCalzado/mostrar',[TipoCalzadoController::class,'mostrar'])->name('tipoCalzado.index');
Route::post('/tipoCalzado/insertar',[TipoCalzadoController::class,'insertar'])->name('tipoCalzado.store');
Route::post('/tipoCalzado/actualizar',[TipoCalzadoController::class,'actualizar'])->name('tipoCalzado.update');
Route::post('/tipoCalzado/eliminar',[TipoCalzadoController::class,'eliminar'])->name('tipoCalzado.delete');

// ---------VEHICULO----------
Route::get('/vehiculo/mostrar',[VehiculoController::class,'mostrar'])->name('vehiculo.index');
Route::post('/vehiculo/insertar',[VehiculoController::class,'insertar'])->name('vehiculo.store');
Route::post('/vehiculo/actualizar',[VehiculoController::class,'actualizar'])->name('vehiculo.update');
Route::post('/vehiculo/eliminar',[VehiculoController::class,'eliminar'])->name('vehiculo.delete');

// --------PRODUCTOS----------
Route::get('/producto/mostrar',[ProductoController::class,'mostrar'])->name('producto.index');
Route::get('/producto/crear',[ProductoController::class,'crear'])->name('producto.crear');
Route::post('/producto/insertar',[ProductoController::class,'insertar'])->name('producto.store');
Route::post('/producto/actualizar',[ProductoController::class,'actualizar'])->name('producto.update');
Route::post('/producto/eliminar',[ProductoController::class,'eliminar'])->name('producto.delete');
