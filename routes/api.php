<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoriaControllerr;
use App\Http\Controllers\Api\ProductorControllerr;
//Route::get('/user', function (Request $request) {
 //   return $request->user();
//})->middleware('auth:sanctum');

//Declarar rutas de categoria
Route::get('/consultar-todas-categorias', [CategoriaControllerr::class, 'index']);
Route::get('/consultar-una-categorias/{categoria}', [CategoriaControllerr::class, 'show']);
Route::post('/guardar-categorias', [CategoriaControllerr::class, 'store']);
Route::put('/actualizar-categorias/{categoria}', [CategoriaControllerr::class, 'update']);
Route::delete('/eliminar-categorias/{categoria}', [CategoriaControllerr::class, 'destroy']);

//Declarar las rutas de producto
Route::get('/consultar-todos-producto', [ProductorControllerr::class, 'index']);
Route::get('/consultar-un-producto/{producto}', [ProductorControllerr::class, 'show']);
Route::post('/guardar-producto', [ProductorControllerr::class, 'store']);
Route::put('/actualizar-producto/{producto}', [ProductorControllerr::class, 'update']);
Route::delete('/eliminar-producto/{producto}', [ProductorControllerr::class, 'destroy']);
