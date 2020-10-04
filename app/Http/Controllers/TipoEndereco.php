<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TipoEndereco extends Controller
{
    protected $fillable = [
        'descricao'
    ];

    public function endereco()
    {
        return $this->belongsTo('App\Models\Endereco;');
    }
}
