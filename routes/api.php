<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ClienteController;
use App\Http\Controllers\Api\ProductoController;
use App\Http\Controllers\Api\NotaDeCompraController;
use App\Http\Controllers\Api\NotaProductoController;

// Rutas Cliente
Route::get('/clientes', [ClienteController::class, 'index']);
Route::get('/clientes/{id}', [ClienteController::class, 'show']);
Route::post('/clientes', [ClienteController::class, 'store']);
Route::put('/clientes/{id}', [ClienteController::class, 'update']);
Route::delete('/clientes/{id}', [ClienteController::class, 'destroy']);
Route::get('/clientes/{id}/notas', [ClienteController::class, 'notas']);

// Rutas Producto
Route::get('/productos', [ProductoController::class, 'index']);
Route::get('/productos/{id}', [ProductoController::class, 'show']);
Route::post('/productos', [ProductoController::class, 'store']);
Route::put('/productos/{id}', [ProductoController::class, 'update']);
Route::delete('/productos/{id}', [ProductoController::class, 'destroy']);

// Rutas Nota de Compra
Route::get('/notas', [NotaDeCompraController::class, 'index']);
Route::get('/notas/{id}', [NotaDeCompraController::class, 'show']);
Route::post('/notas', [NotaDeCompraController::class, 'store']);
Route::put('/notas/{id}', [NotaDeCompraController::class, 'update']);
Route::delete('/notas/{id}', [NotaDeCompraController::class, 'destroy']);
// Funcionalidad extra: calcular total de una nota
Route::get('/notas/{id}/total', [NotaDeCompraController::class, 'calcularTotal']);


// Extra: obtener productos de una nota
Route::get('/notas/{id}/productos', [NotaDeCompraController::class, 'productos']);

// Rutas NotaProducto (tabla pivote)
Route::get('/nota-producto', [NotaProductoController::class, 'index']);
Route::get('/nota-producto/{id}', [NotaProductoController::class, 'show']);
Route::post('/nota-producto', [NotaProductoController::class, 'store']);
Route::put('/nota-producto/{id}', [NotaProductoController::class, 'update']);
Route::delete('/nota-producto/{id}', [NotaProductoController::class, 'destroy']);
