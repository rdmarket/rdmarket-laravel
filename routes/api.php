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

//rota checkout 
Route::post('/realizarCompra/{id}','Api\checkout\CheckoutController@realizarCompra')->name('api.realizarCompra');
Route::get('/devolverDadosCartao/{id}','Api\checkout\CheckoutController@devolverDadosCartao')->name('api.devolverDadosCartao');


//rota produtos
Route::get('/produtos/listarPorTipo/{id_tipo_produto}', 'Api\ProdutoController@listarPorTipo')
->name('api.produtos.listarPorTipo');
Route::get('/produtos/listarNovidades', 'Api\ProdutoController@listarNovidades')
->name('api.produtos.listarNovidades');
Route::get('/produtos/listarDescontos', 'Api\ProdutoController@listarDescontos')
->name('api.produtos.listarDescontos');
Route::apiResource('produtos', 'Api\ProdutoController');
// Route::get('/produtos/listar', 'Api\ProdutoController@listar')
// ->name('api.listar.produto');
// CRUD Pedidos
Route::get('pedidosPorCliente/{id_cliente}','Api\PedidoController@pedidosPorCliente');
Route::post('pedido/gerarPedido','Api\PedidoController@gerarPedido');
Route::apiResource('pedidos', 'Api\PedidoController');

//rota endereco
Route::apiResource('endereco', 'Api\EnderecoController');

