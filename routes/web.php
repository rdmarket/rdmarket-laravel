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
