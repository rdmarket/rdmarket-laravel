<?php

namespace App\Http\Controllers\admin;

use App\Models\CategoriaProduto;
use App\Models\Preco;
use App\Models\Estoque;
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
        $categorias = CategoriaProduto::
        select('id_categoria', 'ds_categoria')
        ->orderBy('ds_categoria', 'ASC')->get();
        
        return view("$this->view.adicionar", compact('categorias'));
    }

    public function editar($id)
    {
        $categorias = CategoriaProduto::
        select('id_categoria', 'ds_categoria')
        ->orderBy('ds_categoria', 'ASC')->get();
        
        $item = $this->classe::find($id);
        return view("$this->view.editar", compact('item', 'categorias'));

    }


    public function deletar(Request $req, $id)
    {
        // $preco = Preco::select('preco.*')->where('id_produto', '=', $id);
        // $preco->delete();

        // $estoque = Estoque::select('estoque.*')>where('id_produto', '=', $id);
        // $estoque->delete();

        $item = $this->classe::find($id);
        $item->delete();

        $req->session()
            ->flash(
                'mensagem',
                "Removido com sucesso"
            );

        return redirect()->route("$this->view");
    }
}
