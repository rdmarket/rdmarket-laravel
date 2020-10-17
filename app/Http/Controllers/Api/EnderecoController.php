<?php

namespace App\Http\Controllers\Api;

use App\Models\Endereco;


class EnderecoController extends BaseController
{
    public function __construct()
    {
        $this->classe = Endereco::class;
    }

    public function index()
    {
        $dados = $this->classe
        ::join('tipo_endereco', 'endereco.id_tipo_endereco', '=', 'tipo_endereco.id_tipo_endereco')
        ->select('endereco.*','tipo_endereco.ds_tipo_endereco')
        ->get();

        if (empty($dados->all())) {
            return response()->json('Item não encontrado.', 404);
        }
        
        return response()->json($dados, 200);
    }

    public function show($id)
    {
        $dados = $this->classe
        ::join('tipo_endereco', 'endereco.id_tipo_endereco', '=', 'tipo_endereco.id_tipo_endereco')
        ->where('endereco.id_endereco','=',$id)
        ->select('endereco.*','tipo_endereco.ds_tipo_endereco')
        ->get();

        if (is_null($dados)) {
            return response()->json('Item não encontrado.', 404);
        }

        return response()->json($dados, 200);
    }

    
}
