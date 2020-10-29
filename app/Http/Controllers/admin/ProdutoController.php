<?php

namespace App\Http\Controllers\admin;

use App\Models\CategoriaProduto;
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

    public function index(Request $req)
    {   
        $itens = $this->classe::join('preco', 'produto.id_produto', '=', 'preco.id_produto')
        ->join('categoria_produto', 'produto.id_categoria', '=', 'categoria_produto.id_categoria')
        ->join('estoque', 'produto.id_produto', '=', 'estoque.id_produto')
        ->select('produto.*', 'preco.*', 'categoria_produto.*', 'estoque.*')
        ->paginate(20);

        $mensagem = $req->session()->get('mensagem');
        return view("$this->view.index", compact('itens', 'mensagem'));
    }

    public function adicionar()
    {
        $categorias = CategoriaProduto::all();
        
        return view("$this->view.adicionar", compact('categorias'));
    }

    public function editar($id)
    {
        $categorias = CategoriaProduto::all();
        $item = $this->classe::find($id);
        return view("$this->view.editar", compact('item', 'categorias'));

    }
}
