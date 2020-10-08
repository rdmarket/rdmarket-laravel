<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

Abstract class BaseController extends Controller
{
    protected $classe;
    
    public function listar(Request $req)
    {
        $dados = $this->classe::all();
        
        if (is_null($dados)) {
            return response()->json('Item não encontrado.', 404);
        }
        
        return response()->json($dados, 200);
    }

    public function salvar(Request $req)
    {
        $dados = $req->all();
        return response()->json($this->classe::create($dados), 201);
    }

    public function buscar($id)
    {
        $dados = $this->classe::find($id);

        if (is_null($dados)) {
            return response()->json('Item não encontrado.', 404);
        }

        return response()->json($dados, 200);
    }

    public function atualizar(Request $req, $id)
    {
        $dados = $req->all();

        $item = $this->classe::find($id);

        if (is_null($item)) {
            return response()->json(['erro' => 'Recurso não encontrado.'], 404);
        }

        return response()->json($item->update($dados), 200);

    }

    public function deletar($id)
    {
        $item = $this->classe::find($id);

        if (is_null($item)) {
            return response()->json(['erro' => 'Recurso não encontrado.'], 404);
        }

        $item->delete();

        return response()->json('Item Removido.', 200);
    }
}
