<?php

namespace App\Http\Controllers\Api;

use App\Models\Endereco;
use App\Models\EnderecoCliente;


class EnderecoController extends BaseController
{
    public function __construct()
    {
        $this->classe = Endereco::class;
    }

    public function listarTipo($id)
    {
        $dados = $this->classe
        ::join('tipo_endereco', 'endereco.id_tipo_endereco', '=', 'tipo_endereco.id_tipo_endereco')
        ->select('endereco.*','tipo_endereco.ds_tipo_endereco')
        ->where('endereco.id_tipo_endereco','=',$id)
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

    public function listarCliente ($id){
        $dados = EnderecoCliente::join('cliente', 'endereco_cliente.id_cliente', '=', 'cliente.id_cliente')
        ->join('endereco', 'endereco_cliente.id_endereco', '=', 'endereco.id_endereco')
        ->join('tipo_endereco', 'endereco.id_tipo_endereco', '=', 'tipo_endereco.id_tipo_endereco')
        ->select('endereco.*','tipo_endereco.*')
        ->where('endereco_cliente.id_cliente','=', $id)
        ->get();


        if (is_null($dados)) {
            return response()->json('Item não encontrado.', 404);
        }

        return response()->json($dados, 200);

    }



    
}
