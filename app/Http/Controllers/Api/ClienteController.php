<?php

namespace App\Http\Controllers\Api;

use App\Models\Cliente;
use App\Models\Contato;
use Illuminate\Http\Request;


class ClienteController extends BaseController
{
    public function __construct() {

        $this->classe = Cliente::class;
    }
public function listarDados($id) {

    $dados = $this->classe::
    join('contato', 'cliente.id_cliente', '=', 'contato.id_cliente')
    ->where('cliente.id_cliente', '=', $id)
    ->select('cliente.nm_cliente', 'cliente.data_nascimento', 'cliente.num_cpf', 'contato.ds_email', 'contato.num_fixo', 'contato.num_celular')
    ->get();

    if (empty($dados->all())) {
        return response()->json('Cliente nao encontrado', 404);
    }    

    return response()->json($dados, 200);

}

}