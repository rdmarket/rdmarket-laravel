<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemPedido extends Model
{
    //
    protected $table = 'item_pedido';
    protected $fillable = ['id_pedido','id_produto','password','qtd_item_produto',
                            'cd_status_item_pedido','vlr_total_item_pedido','data_item_pedido'];

    public function pedido()
    {
        return $this->belongsTo('App\Models\Pedido');
    }
}
