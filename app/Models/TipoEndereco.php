<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoEndereco extends Model
{
    protected $fillable = [
        'descricao'
    ];

    protected $table = 'tipo_endereco';

    public function endereco()
    {
        return $this->belongsTo('App\Models\Endereco');
    }
}
