<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatusPedido extends Model
{
    //
    protected $table = 'status_pedido';
    protected $fillable = ['desc_status_pedido'];


    public function pedido()
    {
        return $this->belongsTo('App\Models\Pedido');
    }
}
