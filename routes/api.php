<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/enviarEmail','Api\ContatoController@enviarEmail')->name('api.enviarEmail');

// CRUD Pedidos
Route::get('/pedidos/listar','Api\PedidoController@listar')->name('api.pedidos');
Route::post('/pedidos/salvar','Api\PedidoController@salvar')->name('api.pedidos.salvar');
Route::get('/pedidos/buscar/{id}','Api\PedidoController@buscar')->name('api.pedidos.buscar');
Route::put('/pedidos/atualizar/{id}','Api\PedidoController@atualizar')->name('api.pedidos.atualizar');
Route::delete('/pedidos/deletar/{id}','Api\PedidoController@deletar')->name('api.pedidos.deletar');