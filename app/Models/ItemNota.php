<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemNota extends Model
{
    protected $fillable = ['id_nf','id_produto','qt_item','vl_unitario'];

    public function notaFiscal()
    {
        return $this->belongsTo('app\Models\NotaFiscal');
    }

    public function produto()
    {
        return $this->hasOne('app\Models\Produto');
    }
}
