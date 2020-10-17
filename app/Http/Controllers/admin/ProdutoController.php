<?php

namespace App\Http\Controllers\admin;

use App\Models\CategoriaProduto;
use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends BaseController
{
    public function __construct()
    {
         $this->classe = Produto::class;
         $this->view = 'admin.produto';
     
    }

    public function index (Request $req)
    {
        $itens = $this->classe::join('categoria_produto', 'produto.id_categoria', '=', 'categoria_produto.id_categoria')
                                ->select ('produto.*','categoria_produto.ds_categoria')->get();
        $mensagem = $req->session()->get('mensagem');
        return view("$this->view.index", compact('itens', 'mensagem'));
    }

    public function adicionar()
    {
        $opcoes = CategoriaProduto::all();
        return view("$this->view.adicionar", compact('opcoes'));
    }

    public function editar($id)
    {
        $opcoes = CategoriaProduto::all();
        $item = $this->classe::find($id);
        return view("$this->view.editar", compact('item', 'opcoes'));
    }
}
