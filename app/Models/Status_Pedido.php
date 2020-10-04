<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusPedido extends Model
{
    //
    protected $table = 'Status_Pedido';
    protected $fillable = ['desc_status_pedido'];


    public function pedido()
    {
        return $this->belongsTo('App\Models\Pedido');
    }
}
