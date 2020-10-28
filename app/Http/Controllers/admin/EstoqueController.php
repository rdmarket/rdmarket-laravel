<?php

namespace App\Http\Controllers\admin;

use App\Models\Estoque;
use App\Models\Produto;
use App\Models\CategoriaProduto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EstoqueController extends BaseController
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
        $produtos = Produto::
        select('id_produto', 'id_categoria', 'ds_produto', 'data_aquisicao')
        ->orderBy('ds_produto', 'ASC')->get();
        
        return view("$this->view.adicionar", compact('produtos'));
    }

    public function salvar(Request $req)
    {
        $item = $req->all();
        $estoqueExistente = $this->classe::all();
        

        foreach($estoqueExistente as $estoque)
        {
            if($estoque->id_produto == $item['id_produto']) {
                return redirect()->route("$this->view");
            }
        }
        
        $this->classe::create($item);
       

        $req->session()
          ->flash(
              'mensagem',
              "Adicionado com sucesso"
          );

        return redirect()->route("$this->view");
    }

    public function editar($id)
    {
        $produtos = Produto::
        select('id_produto', 'id_categoria', 'ds_produto', 'data_aquisicao')
        ->orderBy('ds_produto', 'ASC')->get();
        
        $item = $this->classe::find($id);
        return view("$this->view.editar", compact('item', 'produtos'));

    }
}
