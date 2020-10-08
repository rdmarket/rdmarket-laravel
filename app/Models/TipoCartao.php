<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoCartao extends Model
{
    protected $fillable = ['ds_tipo_cartao'];

    protected $table = 'tipo_cartao';

    public function cartao()
    {
        return $this->hasOne('App\Models\Cartao');
    }
}
