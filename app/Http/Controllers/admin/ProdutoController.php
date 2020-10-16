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

    public function listarPorTipo (Request $req, $id_categoria)
    {
        $itens = $this->classe::
        ->join('categoria_produto')


        // ->where('id_categoria', "$id_categoria");
        // $mensagem = $req->session()->get('mensagem');
        return view("$this->view.index", compact('itens', 'mensagem'));
    }  
}
