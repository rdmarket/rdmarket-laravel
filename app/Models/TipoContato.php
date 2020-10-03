<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoContato extends Model
{
    protected $fillable = ['id_tipo_contato','ds_tipo_contato'];

    public function contato()
    {
        return $this->hasOne('App\Models\Contato');
    }
}
