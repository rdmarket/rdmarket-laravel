<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoProduto extends Model
{
    protected $fillable = [
        'id_tipo_produto','ds_tipo_produto'
    ];

    protected $table = 'tipo_produto';

    public function produto()
    {
        return $this->hasOne('App\Models\Produto');
    }
}
