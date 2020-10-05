<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'nome', 'cpf', 'data_nascimento', 'senha'
    ];
    
    protected $table = 'cliente';
    
    public function contato()
    {
        return $this->hasMany('App\Models\Contato');
    }

    public function cartao()
    {
        return $this->hasMany('App\Models\Cartao');
    }

    public function endereco()
    {
        return $this->hasMany('App\Models\EnderecoCliente');
    }
}
