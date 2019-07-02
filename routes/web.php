<?php

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

Route::get('/','Controller@index')->name('inicio');

/** Rutas Inventario */
Route::get('/listarProductos','ProductoController@index')->name('listarProductos');


//Agregar producto
Route::get('agregarProducto', 'ProductoController@create')->name('agregarProducto');
Route::post('guardarProducto', 'ProductoController@store')->name('guardarProducto');

//Editar producto
Route::get('editarProducto', 'ProductoController@edit')->name('editarProducto');
Route::put('guardarModificacion', 'ProductoController@update')->name('guardarModificacion');

//Eliminar producto
Route::delete('eliminarProducto', 'ProductoController@destroy')->name('eliminarProducto');

//Editar stock
Route::put('guardarStock', 'ProductoController@updateStock')->name('guardarStock');


/** Rutas tienda */
Route::get('/shop','Controller@shop')->name('tienda');
Route::get('listarVentas','VentaController@index')->name('listarVentas');
Route::get('agregarVenta', 'VentaController@create')->name('agregarVenta');
Route::post('guardarVenta', 'VentaController@store');
Route::get('detalleVenta','VentaController@show')->name('detalleVenta');
Route::get('listPagos','VentaController@generarPagos');
Route::get('buscarVenta','VentaController@buscarVenta');
Route::get('listClientes','ClienteController@listar');
Route::get('listProductos','ProductoController@listar');


/** Rutas Cliente */
Route::get('listarClientes','ClienteController@index')->name('listarClientes');
Route::post('guardarCliente', 'ClienteController@store')->name('guardarCliente');
Route::put('guardarModificacionCliente', 'ClienteController@update')->name('guardarModificacionCliente');
Route::delete('eliminarCliente', 'ClienteController@destroy')->name('eliminarCliente');