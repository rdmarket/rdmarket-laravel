<?php

namespace App\Http\Controllers\admin;

use App\Models\Produto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProdutoController extends BaseController
{
    public function __construct()
    {
         $this->classe = Produto::class;
         $this->view = 'admin.produto';
     
    }

    public function listarPorTipo (Request $req, $id_tipo_produto)
    {
        $itens = $this->classe::all()->where('id_tipo_produto', "$id_tipo_produto");
        $mensagem = $req->session()->get('mensagem');
        return view("$this->view.index", compact('itens', 'mensagem'));
    }

    
}
