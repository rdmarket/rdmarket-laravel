<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Estoque;
use App\Models\Pedido;


class CarrinhoController extends BaseController
{
    //

    public function __construct()
    {
        $this->classe = Produto::class;
    }

    public function adicionarItemCarrinho(Request $req,$id)
    {
        $estoque = Estoque::find($id);

        $idCliente=''; //= alguma coisa que receba o id do cliente logado

        if(empty($estoque)){
            return response()->json('O produto solicitado não existe no estoque',404);
        }

        if($req['quantidade'] > $estoque->qtd_produto_estoque){
            return response()->json('Não existe essa quantidade de produto em estoque',404);
        }
        
        $estoque->qtd_produto_estoque -= intval($req['quantidade']);
        Estoque::find($id)->update($estoque);

        $pedido = Pedido::find($id);

        if(empty($pedido)){

            //função do douglas
            //criarPedido($idCliente);//se precisar da $idCliente
            //criarPedido() //se não precisar id e tiver como pegar do Auth0
        }

        //aqui também a função do douglas
        //criarItemPedido($req);

        

    }
}
