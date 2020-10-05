<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClienteController extends BaseController
{
   public function __construct()
   {
        $this->classe = Cliente::class;
        $this->view = 'admin.clientes';
    
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
