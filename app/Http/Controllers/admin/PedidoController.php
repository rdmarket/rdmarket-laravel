<?php

namespace App\Http\Controllers\admin;
use App\Models\Pedido;

class PedidoController extends BaseController
{
     public function __construct()
     {
        $this->classe = Pedido::class;
        $this->view = 'admin.pedidos';
     }
}
