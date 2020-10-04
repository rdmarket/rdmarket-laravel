<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    public function cliente()
    {
        return $this->belongsTo('App\Models\Cliente');
    }
    
}




