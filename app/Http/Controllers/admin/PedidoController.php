<?php

namespace App\Http\Controllers\admin;
use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoController extends BaseController
{
   public function __construct()
   {
      $this->classe = Pedido::class;
      $this->view = 'admin.pedidos';
   }

   public function index(Request $req)
   {
      $itens = $this->classe::join('cliente','pedido.id_cliente','=','cliente.id_cliente')
                              ->join('forma_pagamento', 'pedido.id_forma_pagamento', '=','forma_pagamento.id_forma_pagamento')
                              ->join('status_pedido', 'pedido.id_status_pedido', '=', 'status_pedido.id_status_pedido')
                              ->select('pedido.data_pedido','pedido.id_pedido','cliente.nm_cliente',
                                       'pedido.nr_pedido','forma_pagamento.ds_forma_pagamento','pedido.vlr_total_pedido',
                                       'pedido.qtd_total_produtos', 'status_pedido.desc_status_pedido')->get();
                        
                        
      $mensagem = $req->session()->get('mensagem');
      return view("$this->view.index", compact('itens', 'mensagem'));
   }
}
