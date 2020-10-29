<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Contato;
use App\Models\Endereco;
use App\Models\EnderecoCliente;
use App\Usuario;
use Illuminate\Http\Request;
use Firebase\JWT\JWT;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function login(Request $request)
    {
        $this->validate($request, [
            'num_cpf' => 'required',
            'vlr_senha' => 'required'
        ]);

        $usuario = Usuario::where('num_cpf', $request->num_cpf)->first();

        if ((is_null($usuario)) || !Hash::check($request->vlr_senha, $usuario->vlr_senha)) {
            return response()->json('Usuario nao cadastrado', 401);
        }

        $token = JWT::encode(
            ['num_cpf' => $request->num_cpf],
            env('JWT_KEY')
        );

        return [
            'message' => 'sucesso',
            'usuario' => $usuario,
            'access_token' => $token
        ];
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        Auth::logout();

        return response()->json(['message' => 'Logout com sucesso']);
    }

    public function cadastrar(Request $request)
    {

        // CLIENTE
        $cliente = new Cliente();
        $cliente['nm_cliente'] = $request->get('nm_cliente');
        $cliente['num_cpf'] = $request->get('num_cpf');
        $cliente['data_nascimento'] = $request->get('data_nascimento');
        $cliente['vlr_senha'] = Hash::make($request->get('vlr_senha'));
        $cliente->save();
        // ENDEREÇO
        $endereco = new Endereco();
        $endereco['num_cep'] = $request->get('num_cep');
        $endereco['nm_rua'] = $request->get('nm_rua');
        $endereco['num_endereco'] = $request->get('num_endereco');
        $endereco['ds_complemento'] = $request->get('ds_complemento');
        $endereco['nm_bairro'] = $request->get('nm_bairro');
        $endereco['nm_cidade'] = $request->get('nm_cidade');
        $endereco['nm_estado'] = $request->get('nm_estado');

        $end = $request->get('id_tipo_endereco');
        if ($end == 'Residencial') {
            $end = 1;
        } else if ($end == 'Comercial') {
            $end = 2;
        } else if ($end == 'Cobrança') {
            $end = 3;
        }
        $endereco['id_tipo_endereco'] = $end;
        $endereco->save();
        // ENDEREÇO CLIENTE
        $endereco_cliente['id_endereco'] = $endereco['id'];
        $endereco_cliente['id_cliente'] = $cliente['id_cliente'];
        EnderecoCliente::create($endereco_cliente);

        // CONTATO
        $contatos['id_cliente'] = $cliente['id_cliente'];
        $contatos['ds_email'] = $request->get('ds_email');
        $contatos['num_celular'] = $request->get('num_celular');
        $contatos['num_fixo'] = $request->get('num_fixo');

        Contato::create($contatos);


        return response()->json($cliente, 200);
    }

    public function usuario($senha)
    {
        $dadosAutenticacao = JWT::decode($senha, env('JWT_KEY'), ['HS256']);

        $usuario = Usuario::where('vlr_senha', '=', $dadosAutenticacao)->select('*')->get();

        return response()->json($usuario, 200);
    }
}
