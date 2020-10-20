<?php

namespace App\Http\Controllers\admin;

use App\Models\Produto;
use App\Models\Preco;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PrecoController extends BaseController
{
    public function __construct()
    {
        $this->classe = Preco::class;
        $this->view = 'admin.preco';
    }

    public function index(Request $req)
    {   
        $itens = $this->classe::join('produto', 'preco.id_produto', '=', 'produto.id_produto')
        ->select('preco.*', 'produto.ds_produto')
        ->get();

        $mensagem = $req->session()->get('mensagem');
        return view("$this->view.index", compact('itens', 'mensagem'));
    }

    public function adicionar()
    {
        $produtos = Produto::all();
        
        return view("$this->view.adicionar", compact('produtos'));
    }

    public function editar($id)
    {
        $produtos = Produto::all();
        $item = $this->classe::find($id);
        return view("$this->view.editar", compact('item', 'produtos'));

    }
}
