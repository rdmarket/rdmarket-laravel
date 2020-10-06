<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $primaryKey = 'id_pedido';
    protected $table = 'pedido';
    protected $fillable = ['id_cliente','id_forma_pagamento','nr_pedido','vlr_total_pedido',
                            'id_status_pedido','id_endereco','data_pedido','nr_parcelas'];
    
    public function statusPedido()
    {
        return $this->hasOne('App\Models\StatusPedido');
    }
    public function formaPagamento()
    {
        return $this->hasOne('App\Models\FormaPagamento');
    }
    public function itemPedido()
    {
        return $this->hasMany('App\Models\ItemPedido');
    }
}
