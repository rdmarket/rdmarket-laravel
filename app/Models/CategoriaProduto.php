<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoriaProduto extends Model
{
    protected $fillable = [
        'id_categoria','ds_categoria'
    ];

    protected $table = 'categoria_produto';

    public function produto()
    {
        return $this->hasOne('App\Models\Produto');
    }
}
