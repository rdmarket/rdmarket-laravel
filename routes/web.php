<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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

Route::get('/home', 'HomeController@index')
->name('home');
Route::get('/', 'HomeController@index')
->name('home');

Route::group(['middleware'=>'auth'], function (){
//Rotas de Clientes
Route::get('/admin/clientes', 'admin\ClienteController@index')
->name('admin.clientes');
Route::get('/admin/clientes/adicionar', 'admin\ClienteController@adicionar')
->name('admin.clientes.adicionar');
Route::post('admin/clientes/salvar', 'admin\ClienteController@salvar')
->name('admin.clientes.salvar');
Route::get('/admin/clientes/editar/{id}', 'admin\ClienteController@editar')
->name('admin.clientes.editar');
Route::put('/admin/clientes/atualizar/{id}', 'admin\ClienteController@atualizar')
->name('admin.clientes.atualizar');
Route::delete('/admin/clientes/deletar/{id}', 'admin\ClienteController@deletar')
->name('admin.clientes.deletar');


//Rotas de Pedidos
Route::get('/admin/pedidos', 'admin\PedidoController@index')
->name('admin.pedidos');
Route::get('/admin/pedidos/adicionar', 'admin\PedidoController@adicionar')
->name('admin.pedidos.adicionar');
Route::post('admin/pedidos/salvar', 'admin\PedidoController@salvar')
->name('admin.pedidos.salvar');
Route::get('/admin/pedidos/editar/{id}', 'admin\PedidoController@editar')
->name('admin.pedidos.editar');
Route::put('/admin/pedidos/atualizar/{id}', 'admin\PedidoController@atualizar')
->name('admin.pedidos.atualizar');
Route::delete('/admin/pedidos/deletar/{id}', 'admin\PedidoController@deletar')
->name('admin.pedidos.deletar');

//Rotas produto
Route::get('/admin/produto', 'admin\ProdutoController@index')
->name('admin.produto');
Route::get('/admin/produto/adicionar', 'admin\ProdutoController@adicionar')
->name('admin.produto.adicionar');
Route::post('admin/produto/salvar', 'admin\ProdutoController@salvar')
->name('admin.produto.salvar');
Route::get('/admin/produto/editar/{id}', 'admin\ProdutoController@editar')
->name('admin.produto.editar');
Route::put('/admin/produto/atualizar/{id}', 'admin\ProdutoController@atualizar')
->name('admin.produto.atualizar');
Route::delete('/admin/produto/deletar/{id}', 'admin\ProdutoController@deletar')
->name('admin.produto.deletar');
});

Auth::routes();