<?php

namespace App\Http\Controllers\admin;

use App\Models\Imagem;
use App\Models\Produto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImagemController extends BaseController
{
    public function __construct()
    {
        $this->classe = Imagem::class;
        $this->view = 'admin.imagem';
    }

    public function index(Request $req)
    {   

        $itens = $this->classe::
        join('produto', 'imagem.id_produto', '=', 'produto.id_produto')
        ->select('imagem.*', 'produto.ds_produto')
        ->get();

        $mensagem = $req->session()->get('mensagem');
        return view("$this->view.index", compact('itens', 'mensagem'));
    }

    public function adicionar()
    {
        $produtos = Produto::all();
        return view("$this->view.adicionar", compact('produtos'));
    }

    public function salvar(Request $req)
    {
        $item = $req->all();
        
        if ($req->hasFile('caminho_imagem')) {
            $item['caminho_imagem'] = $this->tratarImagem($req);
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
        $produtos = Produto::all();

        $item = $this->classe::find($id);
        return view("$this->view.editar", compact('item', 'produtos'));
    }

    public function atualizar(Request $req, $id)
    {
        $item = $req->all();

        if ($req->hasFile('imagem')) {
            $item['imagem'] = $this->tratarImagem($req);
        }

        $itemSelecionado = $this->classe::find($id);
        $itemSelecionado->update($item);

        $req->session()
            ->flash(
                'mensagem',
                "Atualizado com sucesso"
            );

        return redirect()->route("$this->view");
    }

    public function tratarImagem(Request $req)
    {
        $imagem = $req->file('caminho_imagem');
        $name = $imagem->getClientOriginalName();
 
        return $name;
    }
}
