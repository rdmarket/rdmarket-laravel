<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Endereco extends Controller
{
    protected $fillable = [
        'id_tipo_endereco', 'cep', 'rua', 'numero', 
        'complemento', 'bairro', 'cidade', 'estado'
    ];

    public function tipo()
    {
        return $this->hasOne('App\Models\TipoEndereco');
    }

    public function cliente()
    {
        return $this->belongsTo('App\Models\EnderecoCliente');
    }

    public function pedido()
    {
        return $this->hasMany('App\Models\Pedido');
    }
}
