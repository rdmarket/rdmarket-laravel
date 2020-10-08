<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoContato extends Model
{
    protected $fillable = ['ds_tipo_contato'];

    protected $table = 'tipo_contato';

    public function contato()
    {
        return $this->hasOne('App\Models\Contato');
    }
}
