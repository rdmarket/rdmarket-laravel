<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class NotaFiscal extends Model
{
    protected $fillable = ['id_pedido','dt_emissao','vl_nota','nr_nf','nr_serie'];
    protected $table = 'nota_fiscal';
    

    public function itemNota()
    {
        return $this->hasMany('app\Models\ItemNota');
    }
}
