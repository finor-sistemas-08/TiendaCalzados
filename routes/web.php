<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\RepartidorController;
use App\Http\Controllers\ModeloController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\TipoCalzadoController;
use App\Http\Controllers\CalzadoController;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\MarcaModeloController;
use App\Http\Controllers\AlmacenController;
use App\Http\Controllers\LoginServer;
use App\Http\Controllers\RegisterServer;
use App\Http\Controllers\CalzadoAlmacenController;
use App\Http\Controllers\PruebaController;
use App\Http\Controllers\PruebaPruebaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\WebController;

use Illuminate\Support\Facades\Auth;
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
        return view('layouts.app');   
    })
    
];

Route::get('/showLogin',[LoginServer::class,'__invoke'])->name('showLogin');
Route::get('/showRegister',[RegisterServer::class,'__invoke'])->name('showRegister');


[Route::get('/dasboard',
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

// --------MARCA MODELO----------
Route::get('/marcaModelo/mostrar',[MarcaModeloController::class,'mostrar'])->name('marcaModelo.index');
Route::get('/marcaModelo/crear',[MarcaModeloController::class,'crear'])->name('marcaModelo.crear');
Route::post('/marcaModelo/insertar',[MarcaModeloController::class,'insertar'])->name('marcaModelo.store');
Route::post('/marcaModelo/actualizar',[MarcaModeloController::class,'actualizar'])->name('marcaModelo.update');
Route::post('/marcaModelo/eliminar',[MarcaModeloController::class,'eliminar'])->name('marcaModelo.delete');

// --------ALMACEN----------
Route::get('/almacen/mostrar',[AlmacenController::class,'mostrar'])->name('almacen.index');
Route::get('/almacen/crear',[AlmacenController::class,'crear'])->name('almacen.crear');
Route::post('/almacen/insertar',[AlmacenController::class,'insertar'])->name('almacen.store');
Route::post('/almacen/actualizar',[AlmacenController::class,'actualizar'])->name('almacen.update');
Route::post('/almacen/eliminar',[AlmacenController::class,'eliminar'])->name('almacen.delete');


// --------CALZADOS----------
Route::get('/calzado/mostrar',[CalzadoController::class,'mostrar'])->name('calzado.index');
Route::get('/calzado/crear',[CalzadoController::class,'crear'])->name('calzado.crear');
Route::post('/calzado/insertar',[CalzadoController::class,'insertar'])->name('calzado.store');
Route::post('/calzado/actualizar',[CalzadoController::class,'actualizar'])->name('calzado.update');
Route::post('/calzado/eliminar',[CalzadoController::class,'eliminar'])->name('calzado.delete');


// CALZADO ALMACEN
Route::get('/calzadoAlmacen/mostrar',[CalzadoAlmacenController::class,'mostrar'])->name('calzadoAlmacen.index');
Route::get('/calzadoAlmacen/crear',[CalzadoAlmacenController::class,'crear'])->name('calzadoAlmacen.create');


Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/index', [App\Http\Controllers\HomeController::class, 'index'])->name('index');


// VENTAS 
Route::get('/venta/mostrar', [App\Http\Controllers\VentaController::class, 'mostrar'])->name('venta.index');
Route::get('/venta/crear', [App\Http\Controllers\VentaController::class, 'crear'])->name('venta.create');

// COMPRA 
Route::get('/compra/mostrar', [App\Http\Controllers\CompraController::class, 'mostrar'])->name('compra.index');
Route::get('/compra/crear', [App\Http\Controllers\CompraController::class, 'crear'])->name('compra.create');


Route::get('/prueba', [App\Http\Controllers\CalzadoController::class, 'prueba']);

// --------USUARIOS----------
Route::get('/usuario/mostrar',[UsuarioController::class,'mostrar'])->name('usuario.index');
Route::get('/usuario/crear',[UsuarioController::class,'crear'])->name('usuario.crear');
Route::post('/usuario/insertar',[UsuarioController::class,'insertar'])->name('usuario.store');
Route::post('/usuario/actualizar',[UsuarioController::class,'actualizar'])->name('usuario.update');
Route::post('/usuario/eliminar',[UsuarioController::class,'eliminar'])->name('usuario.delete');


Route::get('/prueba',[PruebaPruebaController::class,'buscar']);
Route::get('/categoria/buscar',[CategoriaController::class,'buscar'])->name('categoria.delete');




// WEB-----
Route::get('/web/calzado',[WebController::class,'calzados'])->name('web.calzado');
Route::get('/web/marca',[WebController::class,'marcas'])->name('web.marca');
Route::get('/web/marca/{id}',[UsuarioController::class,'marcaDetalle'])->name('marca.detalle');



