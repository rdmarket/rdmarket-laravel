<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    protected $fillable = ['id_contato','id_cliente','id_tipo_contato', 'ds_tipo_contato'];

    public function tipoContato()
    {
        return $this->hasOne('App\Models\TipoContato');
    }
}