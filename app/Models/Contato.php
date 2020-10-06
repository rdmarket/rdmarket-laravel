<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    protected $fillable = ['id_cliente','id_tipo_contato', 'ds_tipo_contato'];

    protected $table = 'contato';

    public function cliente()
    {
        $this->belongsTo('App\Models\Cliente');
    }
    
    public function tipoContato()
    {
        return $this->hasOne('App\Models\TipoContato');
    }
}