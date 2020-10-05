<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = [
        'id_produto','id_tipo_produto','ds_produto','data_aquisicao',
    ];

    protected $table = 'produto';

    public function tipoProduto()
    {
        return $this->hasOne('App\Models\TipoProduto');
    }

    public function estoque()
    {
        return $this->belongsTo('App\Models\Estoque');
    }

    public function imagem()
    {
        return $this->hasMany('App\Models\Imagem');
    }

    public function preco()
    {
        return $this->hasMany('App\Models\Preco');
    }

    public function itemPedido()
    {
        return $this->belongsTo('App\Models\ItemPedido');
    }

}
