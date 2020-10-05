<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Imagem extends Model
{
    protected $fillable = [
        'id_imagem','id_produto','caminho_imagem','ds_imagem_produto',
    ];

    protected $table = 'imagem';

    public function produto()
    {
        return $this->belongsTo('App\Models\Produtos');
    }
}
