<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormaPagamento extends Model
{
    //
    protected $table = 'Forma_Pagamento';
    
    public function pedido()
    {
        return $this->belongsTo('App\Models\Pedido');
    }
    protected $fillable = ['ds_forma_pagamento'];
}
