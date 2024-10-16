<?php
use App\Http\Controllers\DescuentosController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\DescuentosControllerController;
use App\Http\Controllers\EntradaProductosController;
use App\Http\Controllers\EntradasController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\ProveedoresController;
use App\Http\Controllers\ProveedoresProductosController;
use App\Http\Controllers\UbicacionController;
use App\Http\Controllers\VentasController;
use App\Http\Controllers\VentaProductosController;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {return view('welcome');});
Route::name('categorias')->get('/categorias',[CategoriasController::class,'categorias']);
Route::name('/categoria_alta')->get('/categoria_alta',[CategoriasController::class,'categoria_alta']);
Route::name('categoria_registrar')->get('/categoria_registrar',[CategoriasController::class,'categoria_registrar']);
Route::name('categoria_detalle')->get('/categoria_detalle/{id}',[CategoriasController::class,'categoria_detalle']);
Route::name('categoria_editar')->get('/categoria_editar/{id}',[CategoriasController::class,'categoria_editar']);
Route::name('categoria_salvar')->put('/categoria_salvar/{id}',[CategoriasController::class,'categoria_salvar']);
Route::name('categoria_borrar')->get('/categoria_borrar/{id}',[CategoriasController::class,'categoria_borrar']);

Route::name('descuentos')->get('/descuentos', [DescuentosController::class, 'descuentos']);
Route::name('descuento_alta')->get('/descuento_alta', [DescuentosController::class, 'descuento_alta']);
Route::name('descuento_registrar')->get('/descuento_registrar', [DescuentosController::class, 'descuento_registrar']);
Route::name('descuento_detalle')->get('/descuento_detalle/{id}', [DescuentosController::class, 'descuento_detalle']);
Route::name('descuento_editar')->get('/descuento_editar/{id}', [DescuentosController::class, 'descuento_editar']);
Route::name('descuento_salvar')->put('/descuento_salvar/{id}', [DescuentosController::class, 'descuento_salvar']);
Route::name('descuento_borrar')->get('/descuento_borrar/{id}', [DescuentosController::class, 'descuento_borrar']);

Route::name('entradas')->get('/entradas', [EntradasController::class, 'entradas']);
Route::name('entrada_alta')->get('/entrada_alta', [EntradasController::class, 'entrada_alta']);
Route::name('entrada_registrar')->get('/entrada_registrar', [EntradasController::class, 'entrada_registrar']);
Route::name('entrada_detalle')->get('/entrada_detalle/{id}', [EntradasController::class, 'entrada_detalle']);
Route::name('entrada_editar')->get('/entrada_editar/{id}', [EntradasController::class, 'entrada_editar']);
Route::name('entrada_salvar')->put('/entrada_salvar/{id}', [EntradasController::class, 'entrada_salvar']);
Route::name('entrada_borrar')->get('/entrada_borrar/{id}', [EntradasController::class, 'entrada_borrar']);

Route::name('personal')->get('/personal', [PersonalController::class, 'personal']);
Route::name('personal_alta')->get('/personal_alta', [PersonalController::class, 'personal_alta']);
Route::name('personal_registrar')->get('/personal_registrar', [PersonalController::class, 'personal_registrar']);
Route::name('personal_detalle')->get('/personal_detalle/{id}', [PersonalController::class, 'personal_detalle']);
Route::name('personal_editar')->get('/personal_editar/{id}', [PersonalController::class, 'personal_editar']);
Route::name('personal_salvar')->put('/personal_salvar/{id}', [PersonalController::class, 'personal_salvar']);
Route::name('personal_borrar')->get('/personal_borrar/{id}', [PersonalController::class, 'personal_borrar']);


Route::name('productos')->get('/productos', [ProductosController::class, 'productos']);
Route::name('producto_alta')->get('/producto_alta', [ProductosController::class, 'producto_alta']);
Route::name('producto_registrar')->get('/producto_registrar', [ProductosController::class, 'producto_registrar']);
Route::name('producto_detalle')->get('/producto_detalle/{id}', [ProductosController::class, 'producto_detalle']);
Route::name('producto_editar')->get('/producto_editar/{id}', [ProductosController::class, 'producto_editar']);
Route::name('producto_salvar')->put('/producto_salvar/{id}', [ProductosController::class, 'producto_salvar']);
Route::name('producto_borrar')->get('/producto_borrar/{id}', [ProductosController::class, 'producto_borrar']);

Route::name('proveedores')->get('/proveedores', [ProveedoresController::class, 'proveedores']);
Route::name('proveedor_alta')->get('/proveedor_alta', [ProveedoresController::class, 'proveedor_alta']);
Route::name('proveedor_registrar')->get('/proveedor_registrar', [ProveedoresController::class, 'proveedor_registrar']);
Route::name('proveedor_detalle')->get('/proveedor_detalle/{id}', [ProveedoresController::class, 'proveedor_detalle']);
Route::name('proveedor_editar')->get('/proveedor_editar/{id}', [ProveedoresController::class, 'proveedor_editar']);
Route::name('proveedor_salvar')->put('/proveedor_salvar/{id}', [ProveedoresController::class, 'proveedor_salvar']);
Route::name('proveedor_borrar')->get('/proveedor_borrar/{id}', [ProveedoresController::class, 'proveedor_borrar']);


Route::name('ubicacion')->get('/ubicacion', [UbicacionController::class, 'ubicacion']);
Route::name('ubicacion_alta')->get('/ubicacion_alta', [UbicacionController::class, 'ubicacion_alta']);
Route::name('ubicacion_registrar')->get('/ubicacion_registrar', [UbicacionController::class, 'ubicacion_registrar']);
Route::name('ubicacion_detalle')->get('/ubicacion_detalle/{id}', [UbicacionController::class, 'ubicacion_detalle']);
Route::name('ubicacion_editar')->get('/ubicacion_editar/{id}', [UbicacionController::class, 'ubicacion_editar']);
Route::name('ubicacion_salvar')->put('/ubicacion_salvar/{id}', [UbicacionController::class, 'ubicacion_salvar']);
Route::name('ubicacion_borrar')->get('/ubicacion_borrar/{id}', [UbicacionController::class, 'ubicacion_borrar']);

Route::name('ventas')->get('/ventas', [VentasController::class, 'ventas']);
Route::name('venta_alta')->get('/venta_alta', [VentasController::class, 'venta_alta']);
Route::name('venta_registrar')->get('/venta_registrar', [VentasController::class, 'venta_registrar']);
Route::name('venta_detalle')->get('/venta_detalle/{id}', [VentasController::class, 'venta_detalle']);
Route::name('venta_editar')->get('/venta_editar/{id}', [VentasController::class, 'venta_editar']);
Route::name('venta_salvar')->put('/venta_salvar/{id}', [VentasController::class, 'venta_salvar']);
Route::name('venta_borrar')->get('/venta_borrar/{id}', [VentasController::class, 'venta_borrar']);
//rutas de las entradas de productos
Route::get('/ep', [EntradaProductosController::class, 'ep'])->name('ep');
Route::name('ep_registrar')->post('/ep_registrar',[EntradaProductosController::class,'ep_registrar']);
Route::name('ep_borrar')->get('/ep_borrar/{id}',[EntradaProductosController::class,'ep_borrar']);

Route::name('pp')->get('/pp', [ProveedoresProductosController::class, 'pp']);
Route::name('pp_registrar')->post('/pp_registrar', [ProveedoresProductosController::class, 'pp_registrar']);
Route::name('pp_borrar')->get('/pp_borrar/{id}', [ProveedoresProductosController::class, 'pp_borrar']);

Route::name('vp')->get('/vp', [VentaProductosController::class, 'vp']);
Route::name('vp_registrar')->post('/vp_registrar', [VentaProductosController::class, 'vp_registrar']);
Route::name('vp_borrar')->get('/vp_borrar/{id}', [VentaProductosController::class, 'vp_borrar']);

