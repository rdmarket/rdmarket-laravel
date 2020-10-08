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

Route::get('/produtos/listar', 'Api\ProdutoController@listar')
->name('api.listar.produto');
// CRUD Pedidos
Route::apiResource('pedidos', 'Api\PedidoController');
