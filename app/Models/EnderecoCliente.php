<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EnderecoCliente extends Model
{
    protected $fillable = [
        'id_cliente', 'id_endereco'
    ];

    protected $table = 'endereco_cliente';

    public function cliente()
    {
        return $this->belongsTo('App\Models\Cliente');
    }

    public function endereco ()
    {
        return $this->belongsTo('App\Models\Endereco');
    }
}
