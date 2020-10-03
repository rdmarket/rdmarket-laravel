<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cartao extends Model
{
    protected $fillable = ['id_cartao','id_cliente','id_tipo_cartao','num_cartao','num_cpf','nm_impresso','nm_bandeira'];

    public function tipoCartao()
    {
        return $this->hasOne('App\Models\TipoCartao');
    }
}
