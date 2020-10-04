<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EnderecoCliente extends Controller
{
    protected $fillable = [
        'id_cliente', 'id_endereco'
    ];

    public function cliente()
    {
        return $this->belongsTo('App\Models\Cliente');
    }

    public function endereco()
    {
        return $this->belongsTo('App\Models\Cliente');
    }
}
