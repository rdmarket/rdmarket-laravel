<?php

namespace App\Http\Controllers\Api;

use App\Models\Estoque;
use App\Models\Pedido;
use App\Models\ItemPedido;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;


class PedidoController extends BaseController
{
    public function __construct()
    {
        $this->classe = Pedido::class;
    }

    public function gerarPedido(Request $req)
    {
        $valorTotalPedido = 0; //contador do valor total para pedido
        $qtdTotalProdutos = 0;//contador de qtde de produtos para pedido

        //Criação de um pedido
        $pedido = new Pedido();
        
        $pedido->id_cliente = $req['id_cliente'];
        $pedido->id_forma_pagamento = $req['id_forma_pagamento'];
        $pedido->nr_pedido = round(rand(1,99999));
        $pedido->id_status_pedido = 2;
        $pedido->id_endereco = $req['id_endereco'];
        $pedido->data_pedido = Carbon::now()->format('Y-m-d G:H:i');
        $pedido->nr_parcelas = $req['nr_parcelas'];
        $pedido->vlr_total_pedido = $valorTotalPedido;
        $pedido->qtd_total_produtos = $qtdTotalProdutos;
        $pedido->save();

        $itens = $req->only('itens');//Request com o contéudo das linhas de produtos no carrinho
        
        //algorítmo que transforma cada linha de produto no carrinho em um ItemPedido
        foreach($itens['itens'] as $item){

            $itemPedido = new ItemPedido();
            $itemPedido->id_pedido = $pedido->id_pedido; // atrelar um ItemPedido ao Pedido
            $itemPedido->id_produto = $item['id'];// atrelar um produto a um ItemPedido
            $itemPedido->qtd_item_produto = $item['qtd']; //quantidade de produto em itemPedido
            $itemPedido->vlr_total_item_pedido = ($item['qtd'] * $item['preco']); // calculo do valor qtde produto * valor_produto
            $itemPedido->nr_item_pedido = round(rand(1,99999)); // numero randomico entre 1 e 99999
            $itemPedido->cd_status_item_pedido = 1; // status item pedido
            $itemPedido->data_item_pedido = Carbon::now()->format('Y-m-d G:H:i');
            $itemPedido->save();

            // $stoq = Estoque::find($item['id']);
            // $stoq->update(['qtd_produto_estoque'=>$stoq->qtd_produto_estoque-$item['qtd']]);


            //incremento a cada item pedido
            $valorTotalPedido += $itemPedido->vlr_total_item_pedido;
            $qtdTotalProdutos += $itemPedido->qtd_item_produto;
        }

        $pedido->vlr_total_pedido = $valorTotalPedido;
        $pedido->qtd_total_produtos = $qtdTotalProdutos;
        $pedido->save();

        $dados = Pedido::join('cliente', 'pedido.id_cliente', '=', 'cliente.id_cliente')
        ->join('status_pedido', 'pedido.id_status_pedido', '=', 'status_pedido.id_status_pedido')
        ->where('pedido.id_pedido','=',$pedido->id_pedido)
        ->select('pedido.id_pedido','pedido.nr_pedido','pedido.vlr_total_pedido',
                'pedido.qtd_total_produtos','pedido.data_pedido','status_pedido.desc_status_pedido')->get();

        return response()->json($dados, 200);
    }

    public function show($id)
    {
        $dados = Pedido::join('cliente', 'pedido.id_cliente', '=', 'cliente.id_cliente')
        ->join('status_pedido', 'pedido.id_status_pedido', '=', 'status_pedido.id_status_pedido')
        ->where('pedido.id_pedido','=',$id)
        ->select('pedido.id_pedido','pedido.nr_pedido','pedido.vlr_total_pedido',
                'pedido.qtd_total_produtos','pedido.data_pedido','status_pedido.desc_status_pedido')->get();

        if (empty($dados->all())) {
            return response()->json('Pedido nao encontrado', 404);
        }

        return response()->json($dados, 200);
    }

    public function listarPorCliente($id)
    {
        $dados = Pedido::join('cliente', 'pedido.id_cliente', '=', 'cliente.id_cliente')
        ->join('status_pedido', 'pedido.id_status_pedido', '=', 'status_pedido.id_status_pedido')
        ->where('pedido.id_cliente','=',$id)
        ->where('status_pedido.desc_status_pedido', 'not like', "%Aguardando pagamento%")
        ->select('pedido.id_pedido','pedido.nr_pedido','pedido.vlr_total_pedido',
                'pedido.qtd_total_produtos','pedido.data_pedido','status_pedido.desc_status_pedido')->orderBy('pedido.id_pedido', 'DESC')->get();

        if (empty($dados->all())) {
            return response()->json('Cliente nao encontrado', 404);
        }    

        return response()->json($dados, 200);
    }
    
}
