<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
    public function cadastrar(Request $req)
    {
        $dados = $req->all();
        $dados['vlr_senha'] = Hash::make($dados['vlr_senha']);

        return response()->json(Usuario::create($dados), 201);
    }

    public function listar(){
        $usuarios = Usuario::all();

        return response()->json($usuarios, 200);
    }

    public function buscarCliente(Request $req){
        $usuarios = DB::table('cliente')->join('contato','cliente.id_cliente','=','contato.id_cliente')
        ->where('cliente.num_cpf','=',$req->cpf)
        ->select('cliente.*','contato.*')
        ->get();

        if(empty($usuarios)){
            return response()->json("Dados não encontrados",404);
        }

        if($req->email != $usuarios[0]->ds_email){
            return response()->json("Email não encontrado",404);
        }

        $req->senha = Hash::make($req->senha);

        DB::table('cliente')
            ->where('cliente.num_cpf', $req->cpf)
            ->update(['vlr_senha' => $req->senha]);

        return response()->json("Senha atualizada com sucesso", 200);
    }

}