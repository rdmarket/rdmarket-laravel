<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estoque extends Model
{
    protected $fillable = [
        'id_produto','qtd_produto_estoque'
    ];

    public function produto()
    {
        return $this->hasMany('App\Models\Produto');
    }
}
