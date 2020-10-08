<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    protected $classe;
    protected $view;

    public function index(Request $req)
    {   

        $itens = $this->classe::all();
        $mensagem = $req->session()->get('mensagem');
        return view("$this->view.index", compact('itens', 'mensagem'));
    }

    public function adicionar()
    {
        return view("$this->view.adicionar");
    }

    public function salvar(Request $req)
    {
        $item = $req->all();


        if ($req->hasFile('imagem')) {
            $item['imagem'] = $this->tratarImagem($req);
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
        $item = $this->classe::find($id);

        return view("$this->view.editar", compact('item'));
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

    public function deletar(Request $req, $id)
    {
        $item = $this->classe::find($id);
        $item->delete();

        $req->session()
            ->flash(
                'mensagem',
                "Removido com sucesso"
            );

        return redirect()->route("$this->view");
    }

    public function tratarImagem(Request $req)
    {
        $imagem = $req->file('imagem');
        $num = rand(1111, 9999);
        $dir = 'img/cursos/';
        $ext = $imagem->guessClientExtension();
        $nomeImagem = 'imagem_' . $num . '.' . $ext;
        $imagem->move($dir, $nomeImagem);

        return $dir . $nomeImagem;
    }
}
