<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Preco extends Model
{
    protected $fillableb = ['id_produto','valor_aquisicao','valor_venda','p_desconto','status_desconto','dt_inicio_desconto','dt_final_desconto'];

    public function produto()
    {
        return $this->belongsTo('app\Models\Produto');
    }
}
