<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Cliente extends Controller
{
    protected $fillable = [
        'nome', 'cpf', 'data_nascimento','senha'
    ];

    public function contato()
    {
        return $this->hasMany('App\Models\Contato');
    }

    public function endereco()
    {
        return $this->hasMany('App\Models\EnderecoCliente');
    }

    public function cartao()
    {
        return $this->hasMany('App\Models\Cartao');
    }
}
