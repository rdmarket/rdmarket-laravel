<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormaPagamento extends Model
{
    //
    protected $table = 'forma_pagamento';
    
    public function pedido()
    {
        return $this->belongsTo('App\Models\Pedido');
    }
    protected $fillable = ['ds_forma_pagamento'];
}
