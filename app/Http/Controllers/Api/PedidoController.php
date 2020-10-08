<?php

namespace App\Http\Controllers\Api;
use App\Models\Pedido;

class PedidoController extends BaseController
{
     public function __construct()
     {
        $this->classe = Pedido::class;
     }
}
