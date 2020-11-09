<?php

namespace App\Http\Controllers\admin;

use App\Models\Cliente;
use App\Models\Contato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClienteController extends BaseController
{

   public function __construct()
   {
        $this->classe = Cliente::class;
        $this->view = 'admin.clientes';
   }

   public function index(Request $req)
    {   
        $itens = $this->classe::
        join('contato', 'cliente.id_cliente', '=', 'contato.id_cliente')
      //   ->join('endereco_cliente', 'cliente.id_cliente', '=', 'endereco_cliente.id_cliente')
      //   ->join('endereco', 'endereco_cliente.id_endereco', '=', 'endereco.id_endereco')
        ->select('cliente.*', 'contato.*')
        ->paginate(20);
         
        $mensagem = $req->session()->get('mensagem');
        return view("$this->view.index", compact('itens', 'mensagem'));
    }

   public function salvar(Request $req)
    {
        $item = $req->all();
        
        if (!$this->validaCPF($item['num_cpf'])) {
           $cpfErrado = 'CPF inválido!';
           return view("$this->view.adicionar", compact('cpfErrado'));

        }
        $item['num_cpf'] = preg_replace("/[^0-9]/", "", $item['num_cpf']);

        
         if(strlen($item['vlr_senha']) < 8){
            $senhaErrada = 'A senha deve conter pelo menos 8 dígitos';
            return view("$this->view.adicionar", compact('senhaErrada'));
         }
      //   if (!$password)
      //   {
      //      $senhaErrada = "A senha deve conter pelo menos: 1 letra, 1 número, 1 caractere especial e 8 dígitos.";
      //      return view("$this->view.adicionar", compact('senhaErrada'));
      //   }
        $item['vlr_senha'] = Hash::make($item['vlr_senha']);

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

    public function atualizar(Request $req, $id)
    {
        $item = $req->all();

        if (!$this->validaCPF($item['num_cpf'])) {
         return redirect()->route("$this->view");
      }

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

     function validaCPF($cpf) {

      // Verifica se um número foi informado
      if(empty($cpf)) {
         return false;
      }
   
      // Elimina possivel mascara
      $cpf = preg_replace("/[^0-9]/", "", $cpf);
      $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);
      
      // Verifica se o numero de digitos informados é igual a 11 
      if (strlen($cpf) != 11) {
         return false;
      }
      // Verifica se nenhuma das sequências invalidas abaixo 
      // foi digitada. Caso afirmativo, retorna falso
      else if ($cpf == '00000000000' || 
         $cpf == '11111111111' || 
         $cpf == '22222222222' || 
         $cpf == '33333333333' || 
         $cpf == '44444444444' || 
         $cpf == '55555555555' || 
         $cpf == '66666666666' || 
         $cpf == '77777777777' || 
         $cpf == '88888888888' || 
         $cpf == '99999999999') {
         return false;
       // Calcula os digitos verificadores para verificar se o
       // CPF é válido
       } else {   
         
         for ($t = 9; $t < 11; $t++) {
            
            for ($d = 0, $c = 0; $c < $t; $c++) {
               $d += $cpf{$c} * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf{$c} != $d) {
               return false;
            }
         }
   
         return true;
      }
   }

}
