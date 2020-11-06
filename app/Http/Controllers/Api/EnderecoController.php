<?php

namespace App\Http\Controllers\Api;

use App\Models\Endereco;
use App\Models\EnderecoCliente;
use App\Models\Cliente;
use Illuminate\Http\Request;


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

    public function adicionarEndereco (Request $request) {
        $cliente = Cliente::find($request->id_cliente);

         // ENDEREÇO
         $endereco = new Endereco();
         $endereco['num_cep'] = $request->num_cep;
         $endereco['nm_rua'] = $request->nm_rua;
         $endereco['num_endereco'] = $request->num_endereco;
         $endereco['ds_complemento'] = $request->ds_complemento;
         $endereco['nm_bairro'] = $request->nm_bairro;
         $endereco['nm_cidade'] = $request->nm_cidade;
         $endereco['nm_estado'] = $request->nm_estado;
 
         $end = $request->id_tipo_endereco;
         if ($end == 'Residencial') {
             $end = 1;
         } else if ($end == 'Comercial') {
             $end = 2;
         } else if ($end == 'Cobrança') {
             $end = 3;
         }
         $endereco['id_tipo_endereco'] = $end;
         $endereco->save();
         // ENDEREÇO CLIENTE
         $endereco_cliente['id_endereco'] = $endereco['id'];
         $endereco_cliente['id_cliente'] = $request->id_cliente;
         EnderecoCliente::create($endereco_cliente);

         return response()->json('Endereço adicionado com sucesso', 200);
    }

    public function listarPorCliente ($id) {

        $dados = $this->classe::
        join('tipo_endereco', 'endereco.id_tipo_endereco', '=', 'tipo_endereco.id_tipo_endereco')
        ->join('endereco_cliente', 'endereco.id_endereco', '=', 'endereco_cliente.id_endereco')
        ->join('cliente', 'endereco_cliente.id_cliente', '=', 'cliente.id_cliente')
        ->where('endereco_cliente.id_cliente', '=', $id)
        ->select('endereco.*', 'tipo_endereco.ds_tipo_endereco')
        ->get();

        if (empty($dados->all())) {
            return response()->json('Cliente nao encontrado', 404);
        }    

        return response()->json($dados, 200);

    }


    
}
