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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['middleware' => 'autenticador'], function () {
    Route::get('/logout', 'loginController@logout');
});


// Route::post('/enviarEmail','Api\ContatoController@enviarEmail')->name('api.enviarEmail');

//rota checkout 
Route::get('/realizarCompra/{id}','Api\checkout\CheckoutController@realizarCompra')->name('api.realizarCompra');
Route::get('/devolverDadosCartao/{id}','Api\checkout\CheckoutController@devolverDadosCartao')->name('api.devolverDadosCartao');
Route::get('/devolverResumo/{id}','Api\checkout\CheckoutController@devolverResumo')->name('api.devolverResumo');
Route::apiResource('checkout', 'Api\checkout\CheckoutController');


//rota produtos

Route::get('/produtos/listarPorPesquisa/{keyword}', 'Api\ProdutoController@listarPorPesquisa')
->name('api.produtos.listarPorPesquisa');

Route::get('/produtos/listarCategorias', 'Api\ProdutoController@listarCategorias')
->name('api.produtos.listarCategorias');

Route::get('/produtos/listarBanner', 'Api\ProdutoController@listarBanner')
->name('api.produtos.listarBanner');
Route::get('/produtos/listarPorTipo/{id_tipo_produto}', 'Api\ProdutoController@listarPorTipo')
    ->name('api.produtos.listarPorTipo');
Route::get('/produtos/listarNovidades', 'Api\ProdutoController@listarNovidades')
    ->name('api.produtos.listarNovidades');
Route::get('/produtos/listarDescontos', 'Api\ProdutoController@listarDescontos')

->name('api.produtos.listarDescontos');

Route::get('/produtos/listarTodosDescontos', 'Api\ProdutoController@listarTodosDescontos')
->name('api.produtos.listarTodosDescontos');

Route::apiResource('produtos', 'Api\ProdutoController');
// Route::get('/produtos/listar', 'Api\ProdutoController@listar')
// ->name('api.listar.produto');

// Pedidos
Route::get('pedidos/listarPorCliente/{id_cliente}', 'Api\PedidoController@listarPorCliente');
Route::post('pedidos/gerarPedido', 'Api\PedidoController@gerarPedido');
Route::apiResource('pedidos', 'Api\PedidoController');


// Login
Route::post('/login', 'loginController@login');
Route::post('/cadastrar', 'loginController@cadastrar');
Route::get('/usuario/{senha}', 'loginController@usuario');

//usuario
Route::post('/buscarUsuario', 'Api\UsuarioController@buscarCliente');

//rota endereco
Route::get('/endereco/listarTipo/{id}', 'Api\EnderecoController@listarTipo')
    ->name('api.endereco.listarTipo');
Route::get('/endereco/listarCliente/{id}', 'Api\EnderecoController@listarCliente')
    ->name('api.endereco.listarCliente');
Route::apiResource('endereco', 'Api\EnderecoController');
