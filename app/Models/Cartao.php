<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cartao extends Model
{
    protected $fillable = ['id_cliente','id_tipo_cartao','num_cartao','num_cpf','nm_impresso','nm_bandeira'];

    protected $table = 'cartao';
    
    public function cliente()
    {
        $this->belongsTo('App\Models\Cliente');
    }
    
    public function tipoCartao()
    {
        return $this->hasOne('App\Models\TipoCartao');
    }
}
