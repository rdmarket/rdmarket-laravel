<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EnderecoCliente extends Model
{
    protected $fillable = [
        'id_cliente', 'id_endereco'
    ];

    public function cliente()
    {
        return $this->belongsTo('App\Models\Cliente');
    }

    public function endereco ()
    {
        return $this->belongsTo('App\Models\Endereco');
    }
}
