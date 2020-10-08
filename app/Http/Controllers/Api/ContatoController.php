<?php

namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;

class ContatoController extends BaseController
{

    public function enviarEmail (Request $req)
    {
        if (mail('supermercadord@outlook.com', 
            $req['assunto'],
            $req['nome'] . '\n' . $req['mensagem'])){
                return response()->json ("Email enviado com sucesso", 200);
            }
        return response()->json ("Erro ao enviar o email", 404);
    }

}
