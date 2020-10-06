<?php

use Illuminate\Support\Facades\Route;



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