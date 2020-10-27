<?php

namespace App\Http\Controllers\Api\checkout;

use App\Http\Controllers\Api\BaseController;
use App\Http\Controllers\Api\nota_fiscal\NotaFiscalController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cartao;
use App\Models\Pedido;
use Illuminate\Support\Facades\DB;

class CheckoutController extends BaseController
{

    public function __construct()
    {
        $this->classe = Cartao::class;
    }
    public function devolverDadosCartao($id_cliente){

        $dados = $dados = DB::table('cartao')
        ->join('tipo_cartao','cartao.id_tipo_cartao','=','tipo_cartao.id_tipo_cartao')
        ->where('cartao.id_cliente','=',$id_cliente)
        ->select('cartao.num_cartao','cartao.num_cpf','cartao.nm_impresso','cartao.nm_bandeira',
                'tipo_cartao.ds_tipo_cartao')
        ->get();

        if (empty($dados->all())) {
            return response()->json('Dados não encontrados.', 404);
        }

        return response()->json($dados,200);
    }
    public function realizarCompra($id_pedido){
        
        $pedido = Pedido::find($id_pedido);

        if(is_null($pedido))
            return response()->json('O pedido não está registrado');

        if($pedido->vlr_total_pedido > 1000.00){
            return response()->json('Ocorreu um erro durante o pagamento',404);
        }
        
        $dado = NotaFiscalController::gerarNotaFiscal($id_pedido);
        

        DB::table('pedido')
                ->where('id_pedido', $id_pedido)
                ->update(['id_status_pedido' => 2]);

        if(empty($dado))
            return response()->json('Não existe produtos adicionados a este pedido',404);


        return response()->json($dado,200);
    }

    public function devolverResumo($id_pedido){

        $dados = DB::table('pedido')
        ->join('item_pedido','pedido.id_pedido','=','item_pedido.id_pedido')
        ->join('produto','item_pedido.id_produto','=','produto.id_produto')
        ->join('categoria_produto','produto.id_categoria','=','categoria_produto.id_categoria')
        ->join('preco','produto.id_produto','=','preco.id_produto')        
        ->where('pedido.id_pedido','=',$id_pedido)
        ->select('item_pedido.qtd_item_produto','item_pedido.vlr_total_item_pedido','produto.ds_produto','categoria_produto.ds_categoria')
        ->get();


        if(empty($dados))
            return response()->json('Não existe produtos adicionados a este pedido',404);


        return response()->json($dados,200);
    }

}
