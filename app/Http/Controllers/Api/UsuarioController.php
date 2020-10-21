<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function cadastrar(Request $req)
    {
        $dados = $req->all();
        $dados['senha'] = Hash::make($dados['senha']);

        return response()->json(Usuario::create($dados), 201);
    }

    public function listar(){
        $usuarios = Usuario::all();

        return response()->json($usuarios, 200);
    }
}
