<?php

namespace App\Http\Controllers\admin\admin;

use App\Models\Estoque;
use App\Models\Produto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EstoqueController extends Controller
{
    public function __construct()
    {
        $this->classe = Estoque::class;
        $this->view = 'admin.estoque';
    }

    public function index(Request $req)
    {   
        $itens = $this->classe::
        join('produto', 'estoque.id_produto', '=', 'produto.id_produto')
        ->select('estoque.*', 'produto.ds_produto')
        ->get();

        $mensagem = $req->session()->get('mensagem');
        return view("$this->view.index", compact('itens', 'mensagem'));
    }

    public function adicionar()
    {
        $produtos = Produto::all();
        
        return view("$this->view.adicionar", compact('categorias'));
    }

    public function editar($id)
    {
        $categorias = CategoriaProduto::all();
        $item = $this->classe::find($id);
        return view("$this->view.editar", compact('item', 'produtos'));

    }
}
