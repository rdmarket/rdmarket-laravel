<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoEndereco extends Model
{
    protected $fillable = [
        'descricao'
    ];

    public function endereco()
    {
        return $this->belongsTo('App\Models\Endereco');
    }
}
