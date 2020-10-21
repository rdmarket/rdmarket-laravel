<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{

    protected $primaryKey = 'id_produto';

    protected $fillable = [
        'id_categoria','ds_produto','data_aquisicao',
    ];

    protected $table = 'produto';

    public function categoriaProduto()
    {
        return $this->hasOne('App\Models\CategoriaProduto');
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
