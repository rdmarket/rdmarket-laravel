<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $fillable = [
        'id_tipo_endereco', 'rua', 'numero', 'complemento', 'bairro', 'cidade', 'estado'
    ];

    protected $table = 'endereco';
    
    public function tipo()
    {
        return $this->hasOne('App\Models\TipoEndereco');
    }

    public function pedido()
    {
        return $this->belongsTo('App\Models\Pedido');
    }

    public function cliente()
    {
        return $this->hasMany('App\Models\EnderecoCliente');
    }
}
