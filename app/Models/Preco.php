<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Preco extends Model
{
    protected $primaryKey = 'id_preco';

    protected $fillable = ['id_produto','valor_aquisicao','valor_venda',
        'p_desconto','status_desconto','dt_inicio_desconto','dt_final_desconto'];

    protected $table = 'preco';

    public function produto()
    {
        return $this->belongsTo('app\Models\Produto');
    }
}
