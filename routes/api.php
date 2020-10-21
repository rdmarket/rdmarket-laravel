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

Route::group(['middleware' => 'autenticador'], function() {
    Route::post('/logout', 'loginController@logout');

    Route::get('/listar', 'Api\UsuarioController@listar');
});


// Route::post('/enviarEmail','Api\ContatoController@enviarEmail')->name('api.enviarEmail');

// CRUD Pedidos
Route::apiResource('pedidos', 'Api\PedidoController');

// Login
Route::post('/login', 'loginController@login');

Route::post('/cadastrar', 'Api\UsuarioController@cadastrar');
