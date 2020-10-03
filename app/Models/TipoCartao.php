<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoCartao extends Model
{
    protected $fillable = ['id_tipo_cartao','ds_tipo_cartao'];

    public function cartao()
    {
        return $this->hasOne('App\Models\Cartao');
    }
}
