<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Contato;
use App\Models\Endereco;
use App\Models\EnderecoCliente;
use Illuminate\Http\Request;
use App\Usuario;
use Firebase\JWT\JWT;
use Illuminate\Support\Facades\Hash;

class loginController extends Controller
{
    public function login(Request $request)
    {
        $this->validate($request, [
            'CPF' => 'required',
            'senha' => 'required'
        ]);

        $usuario = Usuario::where('CPF', $request->CPF)->first();

        if ((is_null($usuario)) || !Hash::check($request->senha, $usuario->senha)) {
            return response()->json('Usuário ou senha inválidos', 401);
        }

        $token = JWT::encode(
            ['CPF' => $request->CPF],
            env('JWT_KEY')
        );

        return ['access_token' => $token];
    }

/**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Logout com sucesso']);
    }

    public function cadastrar(Request $request)
    {
        $cliente = new Cliente;
        $cliente->nome = $request->nome + $request->sobrenome;
        $cliente->senha = $request->senha;
        $cliente->conf_senha = $request->conf_senha;
        $cliente->data_nascimento = $request->data_nascimento;
        $cliente->save();

        $endereco = new Endereco;
        $endereco->CEP = $request->CEP;
        $endereco->bairro = $request->bairro;
        $endereco->cidade = $request->cidade;
        $endereco->estado = $request->estado;
        $endereco->save();

        $endereco_cliente = new EnderecoCliente;
        $endereco_cliente->id_cliente = $cliente->id_cliente;
        $endereco_cliente->id_endereco = $endereco->id_endereco;
        $endereco_cliente->save();

        
        $contatos = new Contato;
        $contatos->telefone = $request->telefone;
        $contatos->celular = $request->celular;
        $contatos->email = $request->email;
        $contatos->id_cliente = $cliente->id_cliente;
        $contatos->save();

        return response()->json(['Cadastro com sucesso',    $cliente->id_cliente],200);

    }
}