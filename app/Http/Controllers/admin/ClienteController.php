<?php

namespace App\Http\Controllers\admin;

use App\Models\Cliente;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClienteController extends BaseController
{
   public function __construct()
   {
        $this->classe = Cliente::class;
        $this->view = 'admin.clientes';
   }
}
