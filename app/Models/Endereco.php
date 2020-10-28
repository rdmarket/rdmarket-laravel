<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $fillable = ['id_tipo_endereco', 'num_cep', 'nm_rua', 'num_endereco', 'ds_complemento', 'nm_bairro', 'nm_cidade', 'nm_estado'];

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
