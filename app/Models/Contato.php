<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    protected $fillable = ['id_cliente', 'ds_email', 'num_celular', 'num_fixo'];

    protected $table = 'contato';

    public function cliente()
    {
        $this->belongsTo('App\Models\Cliente');
    }
}