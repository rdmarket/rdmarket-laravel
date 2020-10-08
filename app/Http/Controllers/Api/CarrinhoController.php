<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CarrinhoController extends BaseController
{
    //

    protected $itensNoCarrinho;

    public function __construct()
    {
        $this->classe = Produto::class;
        $itensNoCarrinho = [];
    }

    public function adicionarItemCarrinho(Request $req)
    {
        
    }
}
