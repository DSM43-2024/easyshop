<?php
use App\Http\Controllers\DescuentosController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\EntradasController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\ProveedoresController;
use App\Http\Controllers\ProveedoresProductosController;
use App\Http\Controllers\UbicacionController;
use App\Http\Controllers\VentasController;
use App\Http\Controllers\VentaProductosController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('index'); })->name('index');

// Categorías
Route::name('categorias')->get('/categorias', [CategoriasController::class, 'categorias']);
Route::name('categoria_alta')->get('/categoria_alta', [CategoriasController::class, 'categoria_alta']);
Route::name('categoria_registrar')->post('/categoria_registrar', [CategoriasController::class, 'categoria_registrar']);
Route::name('categoria_detalle')->get('/categoria_detalle/{id}', [CategoriasController::class, 'categoria_detalle']);
Route::name('categoria_editar')->get('/categoria_editar/{id}', [CategoriasController::class, 'categoria_editar']);
Route::name('categoria_salvar')->put('/categoria_salvar/{id}', [CategoriasController::class, 'categoria_salvar']);
Route::name('categoria_borrar')->get('/categoria_borrar/{id}', [CategoriasController::class, 'categoria_borrar']);

// Descuentos
Route::name('descuentos')->get('/descuentos', [DescuentosController::class, 'descuentos']);
Route::name('descuento_alta')->get('/descuento_alta', [DescuentosController::class, 'descuento_alta']);
Route::name('descuento_registrar')->post('/descuento_registrar', [DescuentosController::class, 'descuento_registrar']);
Route::name('descuento_detalle')->get('/descuento_detalle/{id}', [DescuentosController::class, 'descuento_detalle']);
Route::name('descuento_editar')->get('/descuento_editar/{id}', [DescuentosController::class, 'descuento_editar']);
Route::name('descuento_salvar')->put('/descuento_salvar/{id}', [DescuentosController::class, 'descuento_salvar']);
Route::name('descuento_borrar')->get('/descuento_borrar/{id}', [DescuentosController::class, 'descuento_borrar']);

// Entradas
Route::name('entradas')->get('/entradas', [EntradasController::class, 'entradas']);
Route::name('entrada_registrar')->post('/entrada_registrar', [EntradasController::class, 'entrada_registrar']);
Route::name('entrada_borrar')->get('/entrada_borrar/{id}', [EntradasController::class, 'entrada_borrar']);

// Personal
Route::name('personal')->get('/personal', [PersonalController::class, 'personal']);
Route::name('personal_alta')->get('/personal_alta', [PersonalController::class, 'personal_alta']);
Route::name('personal_registrar')->post('/personal_registrar', [PersonalController::class, 'personal_registrar']);
Route::name('personal_detalle')->get('/personal_detalle/{id}', [PersonalController::class, 'personal_detalle']);
Route::name('personal_editar')->get('/personal_editar/{id}', [PersonalController::class, 'personal_editar']);
Route::name('personal_salvar')->put('/personal_salvar/{id}', [PersonalController::class, 'personal_salvar']);
Route::name('personal_borrar')->get('/personal_borrar/{id}', [PersonalController::class, 'personal_borrar']);

// Productos
Route::name('productos')->get('/productos', [ProductosController::class, 'productos']);
Route::name('producto_registrar')->post('/producto_registrar', [ProductosController::class, 'producto_registrar']);
Route::name('producto_borrar')->get('/producto_borrar/{id}', [ProductosController::class, 'producto_borrar']);

// Proveedores
Route::name('proveedores')->get('/proveedores', [ProveedoresController::class, 'proveedores']);
Route::name('proveedor_alta')->get('/proveedor_alta', [ProveedoresController::class, 'proveedor_alta']);
Route::name('proveedor_registrar')->post('/proveedor_registrar', [ProveedoresController::class, 'proveedor_registrar']);
Route::name('proveedor_detalle')->get('/proveedor_detalle/{id}', [ProveedoresController::class, 'proveedor_detalle']);
Route::name('proveedor_editar')->get('/proveedor_editar/{id}', [ProveedoresController::class, 'proveedor_editar']);
Route::name('proveedor_salvar')->put('/proveedor_salvar/{id}', [ProveedoresController::class, 'proveedor_salvar']);
Route::name('proveedor_borrar')->get('/proveedor_borrar/{id}', [ProveedoresController::class, 'proveedor_borrar']);

// Ubicación
Route::name('ubicacion')->get('/ubicacion', [UbicacionController::class, 'ubicacion']);
Route::name('ubicacion_alta')->get('/ubicacion_alta', [UbicacionController::class, 'ubicacion_alta']);
Route::name('ubicacion_registrar')->post('/ubicacion_registrar', [UbicacionController::class, 'ubicacion_registrar']);
Route::name('ubicacion_detalle')->get('/ubicacion_detalle/{id}', [UbicacionController::class, 'ubicacion_detalle']);
Route::name('ubicacion_editar')->get('/ubicacion_editar/{id}', [UbicacionController::class, 'ubicacion_editar']);
Route::name('ubicacion_salvar')->put('/ubicacion_salvar/{id}', [UbicacionController::class, 'ubicacion_salvar']);
Route::name('ubicacion_borrar')->get('/ubicacion_borrar/{id}', [UbicacionController::class, 'ubicacion_borrar']);

// Ventas
Route::name('ventas')->get('/ventas', [VentasController::class, 'ventas']);
Route::name('venta_registrar')->post('/venta_registrar', [VentasController::class, 'venta_registrar']);
Route::name('venta_borrar')->get('/venta_borrar/{id}', [VentasController::class, 'venta_borrar']);

// Proveedores-Productos
Route::name('pp')->get('/pp', [ProveedoresProductosController::class, 'pp']);
Route::name('pp_registrar')->post('/pp_registrar', [ProveedoresProductosController::class, 'pp_registrar']);
Route::name('pp_borrar')->get('/pp_borrar/{id}', [ProveedoresProductosController::class, 'pp_borrar']);

// Ventas-Productos
Route::name('vp')->get('/vp', [VentaProductosController::class, 'vp']);
Route::name('vp_registrar')->post('/vp_registrar', [VentaProductosController::class, 'vp_registrar']);
Route::name('vp_borrar')->get('/vp_borrar/{id}', [VentaProductosController::class, 'vp_borrar']);

