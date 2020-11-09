<?php

namespace App\Http\Controllers\Api;

use App\Models\Cliente;
use App\Models\Cartao;
use App\Models\TipoCartao;
use Illuminate\Http\Request;


class CartaoController extends BaseController
{
    public function __construct()
    {
        $this->classe = Cartao::class;
    }

    public function adicionarCartao (Request $request) {
        $cliente = Cliente::find($request->id_cliente);

         $cartao = new Cartao();
         $cartao['id_cliente'] = $request->id_cliente;
         $cartao['num_cartao'] = $request->num_cartao;
         $cartao['num_cpf'] = $request->num_cpf;
         $cartao['nm_impresso'] = $request->nm_impresso;
         $cartao['nm_bandeira'] = $request->nm_bandeira;


         $end = $request->id_tipo_cartao;
         if ($end == 'Débito') {
             $end = 1;
         } else if ($end == 'Crédito') {
             $end = 2;
         }
         $cartao['id_tipo_cartao'] = $end;
         $cartao->save();
        
         return response()->json('Cartão adicionado com sucesso', 200);
    }

    public function listarPorCliente ($id) {

        $dados = $this->classe::
        join('tipo_cartao', 'cartao.id_tipo_cartao', '=', 'tipo_cartao.id_tipo_cartao')
        ->join('cliente', 'cartao.id_cliente', '=', 'cliente.id_cliente')
        ->where('cliente.id_cliente', '=', $id)
        ->select('cartao.*', 'tipo_cartao.ds_tipo_cartao')
        ->get();

        if (empty($dados->all())) {
            return response()->json('Cliente nao encontrado', 404);
        }    

        return response()->json($dados, 200);

    }

    public function editarCartao($id) {

        $dados = $this->classe::find($id)
        ->join('tipo_cartao', 'cartao.id_tipo_cartao', '=', 'tipo_cartao.id_tipo_cartao');

        return response()->json($dados, 200);
    }

    public function atualizarCartao(Request $request, $id) {

        $cliente = Cliente::find($request->id_cliente);

        $cartao = $this->classe::find($id);
         $cartao['id_cliente'] = $request->id_cliente;
         $cartao['num_cartao'] = $request->num_cartao;
         $cartao['num_cpf'] = $request->num_cpf;
         $cartao['nm_impresso'] = $request->nm_impresso;
         $cartao['nm_bandeira'] = $request->nm_bandeira;

         $end = $request->id_tipo_cartao;
         if ($end == 'Débito') {
             $end = 1;
         } else if ($end == 'Crédito') {
             $end = 2;
         }
         $cartao['id_tipo_cartao'] = $end;
         $cartao->update();

        return response()->json('Cartão atualizado com sucesso', 200);

    }


}