<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'nm_cliente', 'num_cpf', 'data_nascimento', 'vlr_senha'
    ];
    
    protected $table = 'cliente';
    protected $primaryKey = 'id_cliente';
    
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
