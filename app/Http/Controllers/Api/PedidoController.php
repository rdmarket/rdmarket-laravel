<?php

namespace App\Http\Controllers\Api;

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
        $pedido = new Pedido();
        $produtos = $req->only('id_produto', 'valor_produto', 'qtd_item_produto');
        

        $valorTotalPedido = 0;

        $pedido->id_cliente = $req['id_cliente'];
        $pedido->id_forma_pagamento = $req['id_forma_pagamento'];
        $pedido->nr_pedido = round(rand(1,99999));
        $pedido->id_status_pedido = 1;
        $pedido->id_endereco = $req['id_endereco'];
        $pedido->data_pedido = Carbon::now()->format('Y-m-d G:H:i');
        $pedido->nr_parcelas = $req['nr_parcelas'];

        $pedido->vlr_total_pedido = $valorTotalPedido;
        $pedido->save();

        for ($i = 0; $i < count($req->id_produto); $i++) {
            $itemPedido = new ItemPedido();
            $itemPedido->id_pedido = $pedido->id_pedido; // atrelar um ItemPedido ao Pedido
            $itemPedido->id_produto = $produtos['id_produto'][$i]; // atrelar um produto a um ItemPedido

            $itemPedido->qtd_item_produto = $produtos['qtd_item_produto'][$i]; //quantidade de produto em itemPedido
            $itemPedido->vlr_total_item_pedido = ($produtos['qtd_item_produto'][$i] * $produtos['valor_produto'][$i]); // calculo do valor qtde produto * valor_produto
            $itemPedido->nr_item_pedido = round(rand(1,99999)); // numero randomico entre 1 e 99999
            $itemPedido->cd_status_item_pedido = 1; // status item pedido
            $itemPedido->data_item_pedido = Carbon::now()->format('Y-m-d G:H:i');

            $itemPedido->save();

            $valorTotalPedido += $itemPedido->vlr_total_item_pedido; //incremento para o valor total do pedido
        }

        $pedido->vlr_total_pedido = $valorTotalPedido;
        $pedido->save();

        $dados = Pedido::join('cliente', 'pedido.id_cliente', '=', 'cliente.id_cliente')
        ->join('item_pedido', 'pedido.id_pedido', '=', 'item_pedido.id_pedido')
        ->join('produto', 'produto.id_produto', '=', 'item_pedido.id_produto')
        ->join('forma_pagamento', 'pedido.id_forma_pagamento', '=', 'forma_pagamento.id_forma_pagamento')
        ->join('status_pedido', 'pedido.id_status_pedido', '=', 'status_pedido.id_status_pedido')
        ->join('endereco', 'pedido.id_endereco', '=', 'endereco.id_endereco')
        ->where('pedido.id_pedido','=',$pedido->id_pedido)
        ->select('pedido.id_pedido','cliente.id_cliente','cliente.nm_cliente', 'forma_pagamento.ds_forma_pagamento',
            'pedido.nr_pedido','item_pedido.nr_item_pedido','produto.ds_produto','pedido.vlr_total_pedido',
            'status_pedido.desc_status_pedido','item_pedido.qtd_item_produto','item_pedido.vlr_total_item_pedido',
            'endereco.id_endereco', 'endereco.id_tipo_endereco', 'endereco.num_cep', 'endereco.nm_rua', 'endereco.num_endereco', 
            'ds_complemento','endereco.nm_bairro', 'endereco.nm_cidade', 'endereco.nm_estado', 'pedido.data_pedido', 
            'pedido.nr_parcelas')->get();

        return response()->json($dados, 200);
    }


    public function show($id)
    {
        $pedidos = Pedido::all()->where('id_pedido', '=', $id);
        if (empty($pedidos->all())) {
            return response()->json('Pedido nao encontrado', 404);
        }
        $dados = Pedido::join('cliente', 'pedido.id_cliente', '=', 'cliente.id_cliente')
        ->join('item_pedido', 'pedido.id_pedido', '=', 'item_pedido.id_pedido')
        ->join('produto', 'produto.id_produto', '=', 'item_pedido.id_produto')
        ->join('forma_pagamento', 'pedido.id_forma_pagamento', '=', 'forma_pagamento.id_forma_pagamento')
        ->join('status_pedido', 'pedido.id_status_pedido', '=', 'status_pedido.id_status_pedido')
        ->join('endereco', 'pedido.id_endereco', '=', 'endereco.id_endereco')
        ->where('pedido.id_pedido','=',$id)
        ->select('pedido.id_pedido','cliente.id_cliente','cliente.nm_cliente', 'forma_pagamento.ds_forma_pagamento',
            'pedido.nr_pedido','item_pedido.nr_item_pedido','produto.ds_produto','pedido.vlr_total_pedido',
            'status_pedido.desc_status_pedido','item_pedido.qtd_item_produto','item_pedido.vlr_total_item_pedido',
            'endereco.id_endereco', 'endereco.id_tipo_endereco', 'endereco.num_cep', 'endereco.nm_rua', 'endereco.num_endereco', 
            'ds_complemento','endereco.nm_bairro', 'endereco.nm_cidade', 'endereco.nm_estado', 'pedido.data_pedido', 
            'pedido.nr_parcelas')->get();
        
            

        return response()->json($dados, 200);
    }

    public function pedidosPorCliente($id)
    {
        $todosPedidosPorClientes = Pedido::all()->where('id_cliente', '=', $id);
        if (empty($todosPedidosPorClientes->all())) {
            return response()->json('Cliente nao encontrado', 404);
        }
        $dados = Pedido::join('cliente', 'pedido.id_cliente', '=', 'cliente.id_cliente')
        ->join('item_pedido', 'pedido.id_pedido', '=', 'item_pedido.id_pedido')
        ->join('produto', 'produto.id_produto', '=', 'item_pedido.id_produto')
        ->join('forma_pagamento', 'pedido.id_forma_pagamento', '=', 'forma_pagamento.id_forma_pagamento')
        ->join('status_pedido', 'pedido.id_status_pedido', '=', 'status_pedido.id_status_pedido')
        ->join('endereco', 'pedido.id_endereco', '=', 'endereco.id_endereco')
        ->where('pedido.id_cliente','=',$id)
        ->select('pedido.id_pedido','cliente.id_cliente','cliente.nm_cliente', 'forma_pagamento.ds_forma_pagamento',
            'pedido.nr_pedido','item_pedido.nr_item_pedido','produto.ds_produto','pedido.vlr_total_pedido',
            'status_pedido.desc_status_pedido','item_pedido.qtd_item_produto','item_pedido.vlr_total_item_pedido',
            'endereco.id_endereco', 'endereco.id_tipo_endereco', 'endereco.num_cep', 'endereco.nm_rua', 'endereco.num_endereco', 
            'ds_complemento','endereco.nm_bairro', 'endereco.nm_cidade', 'endereco.nm_estado', 'pedido.data_pedido', 
            'pedido.nr_parcelas')->get();
        

        return response()->json($dados, 200);
    }
    
}
